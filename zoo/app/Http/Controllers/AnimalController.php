<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Rusys;
use App\Models\Manager;

class AnimalController extends Controller
{
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
        $animal = new Animal;
        $animal->nick = $request->animal_nick;

        $animal->rusys_id = $request->rusys_id;
        $animal->year = $request->animal_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index');
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
        $manager = Manager::all();
        return view('animal.edit', ['manager' => $manager, 'rusys' => $rusys, 'animal' => $animal]);
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
        $animal->nick = $request->animal_nick;

        $animal->rusys_id = $request->rusys_id;
        $animal->year = $request->animal_year;
        $animal->animal_book = $request->animal_book;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
