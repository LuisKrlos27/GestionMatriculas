<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia_Docente extends Model
{
    
    protected $table = 'materias_docentes';

    protected $fillable = [
        'id_docente', 'id_materia', 'id_sede',
        'id_programa', 'semestre', 'id_horario'
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
}
