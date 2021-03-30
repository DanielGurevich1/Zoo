<?php

namespace App\Http\Controllers;

use App\Models\Rusys;
use Illuminate\Http\Request;

class RusysController extends Controller
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

        $rusys = Rusys::all();
        return view('rusys.index', ['rusys' => $rusys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rusys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rusys = new Rusys;
        $rusys->name = $request->rusys_name;

        $rusys->save();
        return redirect()->route('rusys.index')->with('success_message', 'Specie was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rusys  $rusys
     * @return \Illuminate\Http\Response
     */
    public function show(Rusys $rusys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rusys  $rusys
     * @return \Illuminate\Http\Response
     */
    public function edit(Rusys $rusys)
    {
        return view('rusys.edit', ['rusys' => $rusys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rusys  $rusys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rusys $rusys)
    {
        $rusys->name = $request->rusys_name;

        $rusys->save();
        return redirect()->route('rusys.index')->with('success_message', 'Specie was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rusys  $rusys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rusys $rusys)
    {
        if ($rusys->rusysHasManagers->count()) {
            return redirect()->route('rusys.index')->with('info_message', 'Cannot delete species with assigned managers.');
        } else {


            $rusys->delete();
            return redirect()->route('rusys.index')->with('info_message', 'Specie was deleted!');
        }
    }
}