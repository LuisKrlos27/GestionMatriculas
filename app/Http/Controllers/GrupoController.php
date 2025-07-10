<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Grupo;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupo = Grupo::all();
        $sede = Sede::all();
        $programa = Programa::all();

        return view("grupos.gruposindex", compact("grupo","sede","programa"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupo = Grupo::all();
        $sede = Sede::all();
        $programa = Programa::all();

        return view("grupos.gruposform", compact("grupo","sede","programa"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nombre"=> "required|string|max:100",
            "id_programa"=> "required|exists:programas,id",
            "id_sede"=> "required|exists:sedes,id",
        ]);

        Grupo::create($validated);
        return redirect()->route("grupos.index")->with("success","Grupo creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        $sede = Sede::all();
        $programa = Programa::all();

        return view("grupos.gruposedit", compact("grupo","sede","programa"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $validated = $request->validate([
            'nombre'=>'required|string|max:100',
            'id_programa'=> 'required|exists:programas,id',
            'id_sede'=>'required|exists:sedes,id',
        ]);

        $grupo->update($validated);
        return redirect()->route("grupos.index")->with("success","Grupo actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route("grupos.index")->with("success","Grupo eliminado correctamente.");
    }
}
