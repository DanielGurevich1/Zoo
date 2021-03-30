<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Rusys;
use App\Models\Manager;
use Validator;

class AnimalController extends Controller
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
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rusys = Rusys::all();
        $managers = Manager::all();
        return view('animal.create', ['rusys' => $rusys, 'managers' => $managers]);
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
                'animal_nick' => ['required', 'min:3', 'max:10'],
                'animal_year' => ['required', 'min:4', 'max:4'],


            ],
            [
                'animal_nick.min' => 'Name is too short',
                'animal_nick.max' => 'Name is too long',
                'animal_year.min' => 'Year is wrong',
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $animal = new Animal;
        $animal->nick = $request->animal_nick;

        $animal->rusys_id = $request->rusys_id;
        $animal->year = $request->animal_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Animal was created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $rusys = Rusys::all();
        $managers = Manager::all();
        return view('animal.edit', ['managers' => $managers, 'rusys' => $rusys, 'animal' => $animal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'animal_nick' => ['required', 'min:3', 'max:10'],
                'animal_year' => ['required', 'min:4', 'max:4'],


            ],
            [
                'animal_nick.min' => 'Name is too short',
                'animal_nick.max' => 'Name is too long',
                'animal_year.min' => 'Year is wrong',
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $animal->nick = $request->animal_nick;

        $animal->rusys_id = $request->rusys_id;
        $animal->year = $request->animal_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Animal was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {

        $animal->delete();
        return redirect()->route('animal.index')->with('info_message', 'Animal was deleted!');
    }
}