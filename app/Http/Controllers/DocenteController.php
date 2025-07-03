<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $docente = Docente::all();

        //dd($docente);
        return view("docentes.docentesindex", compact('docente'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("docentes.docentesform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre'=>'required|string|max:100',
            'correo'=>'nullable|email|max:50',
            'titulo'=>'nullable|string|max:50',
        ]);

        //crear nuevo docente con los datos validos
        Docente::create($validated);

        //redirigir a la lista con mensaje de exito
        return redirect()->route('docentes.index')->with('success','Docente registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        return view('docentes.docentesedit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        $validated = $request->validate([
            'nombre'=>'required|string|max:100',
            'correo'=>'nullable|email|max:50',
            'titulo'=>'nullable|string|max:50',
        ]);

        $docente->update($validated);

        return redirect()->route('docentes.index')->with('success','Docente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')->with('success','Docente eliminado correctamente.');
    }
}
