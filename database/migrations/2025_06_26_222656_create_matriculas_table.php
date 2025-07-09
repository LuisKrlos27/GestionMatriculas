<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');
            $table->bigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sedes');
            $table->bigInteger('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programas');
            $table->bigInteger('id_materia')->unsigned();
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->bigInteger('id_grupo');
            $table->date('fecha_matricula')->nullable();
            $table->boolean('estado')->default(false);
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
