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
        Schema::create('materias_docentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_docente')->unsigned();
            $table->foreign('id_docente')->references('id')->on('docentes');
            $table->bigInteger('id_materia')->unsigned();
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->integer('semestre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias_docentes');
    }
};
