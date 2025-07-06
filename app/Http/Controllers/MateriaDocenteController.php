<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Materia;
use App\Models\Materia_Docente;
use Illuminate\Http\Request;

class MateriaDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $materia_docente = Materia_Docente::all();

        return view("materiaDocente.materiaDocenteindex", compact("materia_docente"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docente = Docente::all();
        $materia = Materia::all();
        return view("materiaDocente.materiaDocenteform", compact("docente","materia"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([

            'id_docente'=>'required|exists:docentes,id',
            'id_materia'=>'required|exists:materias,id',
            'semestre'=>'nullable|integer|max:50',

        ]);


        Materia_Docente::create($validated);
        return redirect()->route('materias_docente.index')->with('success', 'Registro exitoso');

    }

    /**
     * Display the specified resource.
     */
    public function show(Materia_Docente $materias_Docentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia_Docente $materias_Docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia_Docente $materias_Docentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia_Docente $materias_Docentes)
    {
        //
    }
}
