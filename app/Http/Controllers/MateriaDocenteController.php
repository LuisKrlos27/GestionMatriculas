<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Materia;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Models\Materia_Docente;
use App\Http\Controllers\Controller;

class MateriaDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $materia_docente = Materia_Docente::all();
        $sede = Sede::all();
        $horario = Horario::all();
        $programa = Programa::all();

        return view("materiaDocente.materiaDocenteindex", compact("materia_docente",'sede','horario','programa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docente = Docente::all();
        $materia = Materia::all();
        $sede = Sede::all();
        $horario = Horario::all();
        $programa = Programa::all();
        return view("materiaDocente.materiaDocenteform", compact("docente","materia","sede","horario",'programa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([

            'id_docente'=>'required|exists:docentes,id',
            'id_materia'=>'required|exists:materias,id',
            'id_sede'=> 'required|exists:sedes,id',
            'id_programa'=> 'required|exists:programas,id',
            'semestre'=>'nullable|integer|max:50',
            'id_horario'=> 'required|exists:horarios,id',

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
    public function edit(Materia_Docente $materias_docente)
    {
        $docente = Docente::all();
        $materia = Materia::all();
        $sede = Sede::all();
        $horario = Horario::all();
        $programa = Programa::all();
        return view('materiaDocente.materiaDocenteedit', compact('materias_docente','docente','materia','sede','horario','programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia_Docente $materias_docente)
    {

        $validated = $request->validate([

            'id_docente'=>'required|exists:docentes,id',
            'id_materia'=>'required|exists:materias,id',
            'id_sede'=> 'required|exists:sedes,id',
            'id_programa'=> 'required|exists:programas,id',
            'semestre'=>'nullable|integer|max:50',
            'id_horario'=> 'required|exists:horarios,id',

        ]);
        $materias_docente->update($validated);
        return redirect()->route('materias_docente.index')->with('success', 'Actualizacion exitosa.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia_Docente $materias_docente)
    {
        $materias_docente->delete();

        return redirect()->route('materias_docente.index')->with('success','Eliminado correctamente');


    }
}
