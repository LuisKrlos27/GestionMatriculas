<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = "programas";
    protected $fillable = ['nombre', 'codigo', 'id_sede'];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_programa');
    }

    public function materias()
    {
        return $this->hasMany(Materia::class, 'id_programa');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_programa');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_programa');
    }

    public function materiasDocentes()
    {
        return $this->hasMany(Materia_Docente::class, 'id_programa');
    }
}
