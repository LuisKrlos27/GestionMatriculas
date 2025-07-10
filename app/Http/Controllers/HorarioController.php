<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Materia;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function Pest\Laravel\delete;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //hago uso de las relaciones
        $horarios = Horario::with('materia', 'docente', 'programa', 'sede')->get();

        //creo un array para separar por grupos los horarios
        $horariosAgrupados = [
            'mañana' => [
                'lunes' => [],
                'martes' => [],
                'miércoles' => [],
                'jueves' => [],
                'viernes' => [],
                'sábado' => [],
            ],
            'tarde' => [
                'lunes' => [],
                'martes' => [],
                'miércoles' => [],
                'jueves' => [],
                'viernes' => [],
                'sábado' => [],
            ],
        ];


        //recorro cada posicion y strlower para convertir todo lo que viene en minisculas
        foreach ($horarios as $hor) {
            $bloque = strtolower($hor->bloque);
            $dia = strtolower($hor->dia);
            $horariosAgrupados[$bloque][$dia][] = $hor;
        }

        return view("horarios.horariosindex", compact('horariosAgrupados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all();
        $docentes = Docente::all();
        $sedes = Sede::all();
        $programas = Programa::all();
        return view('horarios.horariosform', compact('materias', 'docentes', 'sedes', 'programas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_docente' => 'required|exists:docentes,id',
            'id_sede' => 'required|exists:sedes,id',
            'id_materia' => 'required|exists:materias,id',
            'id_programa' => 'required|exists:programas,id',
            'dia' => 'required|string|in:lunes,martes,miércoles,jueves,viernes,sábado',
            'bloque' => 'required|string|in:mañana,tarde',
            'fecha_inicio'=> 'date',
            'fecha_final'=> 'date',
    ]);

    Horario::create($validated);

    return redirect()->route('horarios.index')->with('success', 'Horario registrado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $materias = Materia::all();
        $docentes = Docente::all();
        $sedes = Sede::all();
        $programas = Programa::all();
        return view('horarios.horariosedit', compact('horario','materias', 'docentes', 'sedes', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        $validated = $request->validate([
            'id_docente' => 'required|exists:docentes,id',
            'id_sede' => 'required|exists:sedes,id',
            'id_materia' => 'required|exists:materias,id',
            'id_programa' => 'required|exists:programas,id',
            'dia' => 'required|string|in:lunes,martes,miércoles,jueves,viernes,sábado',
            'bloque' => 'required|string|in:mañana,tarde',
            'fecha_inicio'=> 'date',
            'fecha_final'=> 'date',
    ]);

    $horario->update($validated);

    return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success','Horario eliminado correctamente.');
    }
}
