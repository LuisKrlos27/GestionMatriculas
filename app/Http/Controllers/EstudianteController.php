<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Programa;
use App\Models\Estudiante;
use Illuminate\Http\Request;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiante = Estudiante::all();
        return view("estudiantes.estudiantesindex", compact("estudiante"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sede = Sede::all();
        $programa = Programa::all();
        return view("estudiantes.estudiantesform", compact("sede","programa"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Validar los datos del formulario
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'documento' => 'required|numeric|unique:estudiantes,documento',
        'edad' => 'nullable|integer|min:0',
        'direccion' => 'nullable|string|max:100',
        'telefono' => 'nullable|numeric',
        'correo' => 'nullable|email|max:50',
        'id_sede'=> 'required|exists:sedes,id',
        'id_programa'=> 'required|exists:programas,id',
        'fecha_nacimiento' => 'nullable|date',
    ]);

    //  Crear nuevo estudiante con los datos validados
    Estudiante::create($validated);

    //  Redirigir a la lista con mensaje de éxito
    return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado correctamente.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $sede = Sede::all();
        $programa = Programa::all();
        return view('estudiantes.estudiantesedit', compact('estudiante','sede','programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'documento' => 'required|numeric|unique:estudiantes,documento,' . $estudiante->id,
        'edad' => 'nullable|integer|min:0',
        'direccion' => 'nullable|string|max:100',
        'telefono' => 'nullable|string|max:20',
        'correo' => 'nullable|email|max:50',
        'id_sede'=> 'required|exists:sedes,id',
        'id_programa'=> 'required|exists:programas,id',
        'fecha_nacimiento' => 'nullable|date',
    ]);

    $estudiante->update($validated);

    return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

    return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');

    }
}
