<?php

namespace App\Models;

use App\Models\Programa;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = "sedes";
    protected $fillable = ['nombre', 'ciudad', 'codigo_postal', 'direccion', 'telefono'];

    public function programas()
    {
        return $this->hasMany(Programa::class, 'id_sede');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_sede');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_sede');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_sede');
    }

    public function materiasDocentes()
    {
        return $this->hasMany(Materia_Docente::class, 'id_sede');
    }
}
