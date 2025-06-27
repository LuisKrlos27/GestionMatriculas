<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $table = "materias";
    public $timestamps = false;
    protected $fillable = [
        'nombre','codigo','id_programa'
    ];
    public function programa()
    {
        return $this->belongsTo(Programas::class, 'id_programa');
    }

    public function matriculas()
    {
        return $this->hasMany(Matriculas::class, 'id_materia');
    }

    public function docentes()
    {
        return $this->belongsToMany(Docentes::class, 'materias_docente', 'id_materia', 'id_docente');
    }
}
