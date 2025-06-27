<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = "programas";
    public $timestamps = false;
    protected $fillable = ["nombre"
    ];

    public function materias()
    {
        return $this->hasMany(Materia::class, 'id_programa');
    }
}

