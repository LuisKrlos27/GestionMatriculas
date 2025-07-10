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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docentes');

            $table->BigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sedes');

            $table->BigInteger('id_materia');
            $table->foreign('id_materia')->references('id')->on('materias');

            $table->BigInteger('id_programa');
            $table->foreign('id_programa')->references('id')->on('programas');

            $table->string('dia', 15);
            $table->string('bloque', 20);
            
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
