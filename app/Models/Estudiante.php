<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudiantes";
    protected $fillable = [
        'nombre', 'apellido', 'documento', 'edad', 'direccion',
        'telefono', 'correo', 'id_sede', 'id_programa', 'fecha_nacimiento'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_estudiante');
    }
}
