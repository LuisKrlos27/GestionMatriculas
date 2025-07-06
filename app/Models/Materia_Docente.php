<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia_Docente extends Model
{
    protected $table = "materias_docentes";
    public $timestamps = false;
    protected $fillable = ["id_docente","id_materia","semestre"];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

}
