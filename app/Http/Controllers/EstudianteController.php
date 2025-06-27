<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view("estudiantes.estudiantesindex", compact("estudiantes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiantes)
    {
        //
    }
}
