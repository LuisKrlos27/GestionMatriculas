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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable();
            $table->string('apellido',100)->nullable();
            $table->integer('documento')->nullable();
            $table->integer('edad')->nullable();
            $table->string('direccion',100);
            $table->bigInteger('telefono');
            $table->string('correo',50);
            $table->bigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sedes');$table->date('fecha_nacimiento')->nullable();
            $table->bigInteger('id_programa');
            $table->foreign('id_programa')->references('id')->on('programas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estduantes');
    }
};
