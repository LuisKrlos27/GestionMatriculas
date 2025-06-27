<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = "materias";
    public $timestamps = false;
    protected $fillable = [
        'nombre','codigo','id_programa'
    ];
    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_materia');
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'materias_docente', 'id_materia', 'id_docente');
    }
}
