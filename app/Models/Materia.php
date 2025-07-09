<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = "materias";
    protected $fillable = ['nombre', 'codigo', 'id_programa', 'id_cod_prog', 'id_sede'];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function materiasDocentes()
    {
        return $this->hasMany(Materia_Docente::class, 'id_materia');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_materia');
    }
}
