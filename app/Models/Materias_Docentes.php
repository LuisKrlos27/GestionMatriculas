<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materias_Docentes extends Model
{
    protected $table = "materias_docente";
    public $timestamps = false;
    protected $fillable = ["id_docente","id_materia","semestre"];

    public function docente()
    {
        return $this->belongsTo(Docentes::class, 'id_docente');
    }

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }

}
