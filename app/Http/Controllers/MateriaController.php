<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Programa;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materia = Materia::with('programa')->get();

        return view("materias.materiasindex", compact("materia"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programa = Programa::all();
        return view("materias.materiasform", compact("programa"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'nullable|string|max:100',
            'codigo' => 'nullable|integer|min:0|unique:materias,codigo',
            'id_programa' => 'required|exists:programas,id',
        ]);
        Materia::create($validated);


        return redirect()->route('materias.index')->with('success','Materia registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        $programa = Programa::all();
        return view('materias.materiasedit', compact('materia','programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:100',
            'codigo' => 'nullable|integer|min:0|unique:materias,codigo,' . $materia->id,
            'id_programa' => 'required|exists:programas,id',
        ]);
        $materia->update($validated);
        return redirect()->route('materias.index')->with('success','Materia registrada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success','Materia eliminada correctamente');
    }
}
