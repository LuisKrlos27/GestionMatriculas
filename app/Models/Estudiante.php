<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudiantes";

    public $timestamps = false;

    protected $fillable = [
        'nombre','apellido','documento','edad',
        'direccion','telefono','correo','fecha_nacimiento'
    ];

    //relaciones
    public function matriculas(){

        return $this->hasMany(Matricula::class,'id_estudiante');
    }


}
