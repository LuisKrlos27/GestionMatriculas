<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = "matriculas";
    protected $fillable = [
        'id_estudiante', 'id_sede', 'id_programa', 'id_materia',
        'id_grupo', 'fecha_matricula', 'estado'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
}
