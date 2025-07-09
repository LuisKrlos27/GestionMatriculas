<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programa = Programa::all();
        $sede = Sede::all();

        return view("programa.programaindex", compact("programa","sede") );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sede = Sede::all();
        return view("programa.programaform", compact("sede") );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'=> 'required|string|max:100',
            'codigo' => 'nullable|integer|min:0|unique:programas,codigo',
            'id_sede'=> 'required|exists:sedes,id',
        ]);

        Programa::create($validated);

        return redirect()->route("programas.index")->with("success","Programa registrado correctamente. ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        $sede = Sede::all();
        return view("programa.programaedit", compact("programa",'sede'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programa $programa)
    {
        $validated = $request->validate([
            'nombre'=> 'required|string|max:100',
            'codigo' => 'nullable|integer|min:0|unique:programas,codigo',
            'id_sede'=> 'required|exists:sedes,id',
        ]);

        $programa->update($validated);

        return redirect()->route("programas.index")->with("success","Programa actualizado correctamente. ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $programa = Programa::find($programa->id);


        if ($programa->materias()->count() > 0) {

            //dd($programa,'dentro de if');
            return back()->with('error', 'No se puede eliminar el programa porque tiene materias asociadas.');
        }
        else {
            $programa->delete();

            return redirect()->route("programas.index")->with("success","Programa eliminado correctamente");

        }
    }
}
