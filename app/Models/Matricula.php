<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = "matriculas";
    public $timestamps = false;
    protected $fillable = ["id_estudiante","id_materia","fecha_matricula","estado"];

    protected $casts = ['estado' => 'boolean',];
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }
}
