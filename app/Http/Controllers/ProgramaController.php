<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programa = Programa::all();

        return view("programa.programaindex", compact("programa"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("programa.programaform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'=> 'required|string|max:100',
        ]);

        Programa::create($validated);

        return redirect()->route("programas.index")->with("success","Programa registrado correctamente. ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        return view("programa.programaedit", compact("programa"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programa $programa)
    {
        $validated = $request->validate([
            'nombre'=> 'required|string|max:100',
        ]);

        $programa->update($validated);

        return redirect()->route("programas.index")->with("success","Programa actualizado correctamente. ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route("programas.index")->with("success","Programa eliminado correctamente");
    }
}
