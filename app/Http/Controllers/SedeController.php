<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sede = Sede::all();
        return view("sedes.sedesindex", compact("sede"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sedes.sedesform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nombre'=>'required|string|max:100',
            'ciudad'=> 'required|string|max:100',
            'codigo_postal'=> 'required|integer',
            'direccion'=> 'required|string|max:50',
            'telefono'=> 'required|integer',
        ]);

        Sede::create($validated);
        return redirect()->route('sedes.index')->with('success','Sede registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sede $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sede $sede)
    {
        return view('sedes.sedesedit', compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sede $sede)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nombre'=>'required|string|max:100',
            'ciudad'=> 'required|string|max:100',
            'codigo_postal'=> 'required|integer',
            'direccion'=> 'required|string|max:50',
            'telefono'=> 'required|integer',
        ]);

        $sede->update($validated);
        return redirect()->route('sedes.index')->with('success','Sede actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sede $sede)
    {
        $sede->delete();
        return redirect()->route('sedes.index')->with('success','Sede eliminada correctamente.');
    }
}
