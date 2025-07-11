<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Programa;
use App\Models\Matricula;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matricula =Matricula::all();
        $estudiante = Estudiante::all();
        $materia = Materia::all();
        $sede = Sede::all();
        $programa = Programa::all();
        $grupo = Grupo::all();

        return view("matriculas.matriculasindex", compact("matricula","estudiante","materia","sede","programa",'grupo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiante = Estudiante::all();
        $materia = Materia::all();
        $programa = Programa::all();
        $sede = Sede::all();
        $grupo = Grupo::all();
        return view("matriculas.matriculasform", compact("estudiante","materia","sede","programa","grupo"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //($request);
        $validated = $request->validate([
            'id_estudiante'=>'required|exists:estudiantes,id',
            'id_sede'=>'required|exists:sedes,id',
            'id_programa'=>'required|exists:programas,id',
            'id_materia'=> 'required|exists:materias,id',
            'id_grupo'=>'required|exists:grupos,id',
            'fecha_matricula'=> 'required|date',
            'estado'=> 'required|boolean',
        ]);

        Matricula::create($validated);
        return redirect()->route('matriculas.index')->with('success','Matricula registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        $estudiante = Estudiante::all();
        $materia = Materia::all();
        $sede = Sede::all();
        $programa = Programa::all();
        $grupo = Grupo::all();
        return view("matriculas.matriculasedit", compact("matricula","estudiante","materia","programa","sede","grupo"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //dd($request->all());
        $validated = $request->validate([
            'id_estudiante'=>'required|exists:estudiantes,id',
            'id_sede'=>'required|exists:sedes,id',
            'id_programa'=>'required|exists:programas,id',
            'id_materia'=> 'required|exists:materias,id',
            'id_grupo'=>'required|exists:grupos,id',
            'fecha_matricula'=> 'required|date',
            'estado'=> 'required|boolean',
        ]);
        $matricula->update($validated);
        return redirect()->route('matriculas.index')->with('success','Matricula actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {

    try
    {
        $matricula->delete();
            return redirect()->route('matriculas.index')->with('success', 'Matrícula eliminada correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar la matrícula: ' . $e->getMessage());
        }
    }

}
