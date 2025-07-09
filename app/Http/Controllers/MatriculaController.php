<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

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

        return view("matriculas.matriculasindex", compact("matricula","estudiante","materia"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiante = Estudiante::all();
        $materia = Materia::all();
        return view("matriculas.matriculasform", compact("estudiante","materia"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //($request);
        $validated = $request->validate([
            'id_estudiante'=>'required|exists:estudiantes,id',
            'id_materia'=> 'required|exists:materias,id',
            'fecha_matricula'=> 'required|date',
            'estado'=> 'required|boolean',
        ]);

        Matricula::create($validated);
        return redirect()->route('matriculas.index')->with('success','Matricula registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matriculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matriculas)
    {
        $estudiante = Estudiante::all();
        $materia = Materia::all();
        return view("matriculas.matriculasedit", compact("estudiante","materia"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matriculas)
    {
         //($request);
        $validated = $request->validate([
            'id_estudiante'=>'required|exists:estudiantes,id',
            'id_materia'=> 'required|exists:materias,id',
            'fecha_matricula'=> 'required|date',
            'estado'=> 'required|boolean',
        ]);
        $matriculas->update($validated);
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
