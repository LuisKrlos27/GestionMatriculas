<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = "horarios";
    protected $fillable = [
        'id_docente', 'id_sede', 'id_materia', 'id_programa',
        'bloque','dia','fecha_inicio', 'fecha_final'
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

    public function materiasDocentes()
    {
        return $this->hasMany(Materia_Docente::class, 'id_horario');
    }
}
