<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Programa;
use App\Models\Sede;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materia = Materia::all();
        $sede = Sede::all();
        return view("materias.materiasindex", compact("materia","sede"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programa = Programa::all();
        $sede = Sede::all();
        return view("materias.materiasform", compact("programa","sede"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $validated = $request->validate([
            'nombre' => 'nullable|string|max:100',
            'codigo' => 'nullable|integer|min:0|unique:materias,codigo',
            'id_programa' => 'required|exists:programas,id',
            'id_cod_prog'=> 'nullable|integer',
            'id_sede'=> 'nullable|exists:sedes,id',
        ]);
        $programa = Programa::findOrFail($validated['id_programa']);
        $validated['id_cod_prog'] = $programa->codigo; // Guardar el valor del código

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
        $sede = Sede::all();
        return view('materias.materiasedit', compact('materia','programa','sede'));
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
            'id_cod_prog'=> 'nullable|integer',
            'id_sede'=> 'nullable|exists:sedes,id',
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
