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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable();
            $table->integer('codigo')->nullable();
            $table->bigInteger('id_programa')->unsigned();
            $table->foreign('id_programa')->references('id')->on('programas');
            $table->bigInteger('id_cod_prog');
            $table->foreign('id_cod_prog')->references('id')->on('programas');
            $table->bigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sedes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
