<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $table = "docentes";
    public $timestamps = false;
    protected $fillable = ['nombre','correo','titulo'];

    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'materias_docente', 'id_docente', 'id_materia');
    }

}
