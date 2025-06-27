<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    protected $table = "programas";
    public $timestamps = false;
    protected $fillable = ["nombre"
    ];

    public function materias()
    {
        return $this->hasMany(Materias::class, 'id_programa');
    }
}

