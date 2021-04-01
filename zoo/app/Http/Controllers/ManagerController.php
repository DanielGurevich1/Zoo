<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\Rusys;
use App\Models\Animal;
use Validator;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // $managers = Manager::all();
        $rusys = Rusys::all();
        // dd($request->rusys_id);
        //     //     //FILTRAVIMAS
        if ($request->rusys_id) {
            $managers  = Manager::where('rusys_id', $request->rusys_id)->get();
            $filterBy = $request->rusys_id;
        } else {
            $managers = Manager::all();
        }

        //     //RUSIAVIMAS
        if ($request->sort && 'asc' == $request->sort) {
            $managers = $managers->sortBy('name');
            $sortBy = 'asc';
        } elseif ($request->sort && 'desc' == $request->sort) {
            $managers = $managers->sortByDesc('name');
            $sortBy = 'desc';
        }



        return view('manager.index', [
            'managers' => $managers,
            'rusys' => $rusys,
            'filterBy' => $filterBy ?? 0,
            'sortBy' => $sortBy ?? ''
        ]);
    }
    // 'animals' => $animals]
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $rusys = Rusys::all();
        return view('manager.create', ['rusys' => $rusys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'manager_name' => ['required', 'min:3', 'max:10'],
                'manager_surname' => ['required', 'min:3', 'max:10'],


            ],
            [
                'manager_name.min' => 'Name is too short',
                'manager_name.max' => 'Name is too long',
                'manager_surname.min' => 'Name is too short',
                'manager_surname.max' => 'Name is too long',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager = new Manager;
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;

        $manager->rusys_id = $request->rusys_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Manager was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $rusys = Rusys::all();
        return view('manager.edit', ['manager' => $manager, 'rusys' => $rusys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'manager_name' => ['required', 'min:3', 'max:10'],
                'manager_surname' => ['required', 'min:3', 'max:10'],


            ],
            [
                'manager_name.min' => 'Name is too short',
                'manager_name.max' => 'Name is too long',
                'manager_surname.min' => 'Name is too short',
                'manager_surname.max' => 'Name is too long',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $manager->name = $request->manager_name;
        $manager->surname = $request->manager_surname;

        $manager->rusys_id = $request->rusys_id;
        $manager->save();
        return redirect()->route('manager.index')->with('success_message', 'Manager was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        if ($manager->managerHasAnimals->count()) {
            return redirect()->route('manager.index')->with('info_message', 'Cannot delete managers with assigned animals.');
        }

        $manager->delete();
        return redirect()->route('manager.index')->with('info_message', 'Manager was deleted!');
    }
}