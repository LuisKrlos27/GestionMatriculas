<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupos";
    protected $fillable = ['nombre', 'id_programa', 'id_sede'];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'id_programa');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_grupo');
    }
}
