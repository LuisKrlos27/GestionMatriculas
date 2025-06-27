<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaDocenteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ProgramaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('estudiantes',EstudianteController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('materias', MateriaController::class);
Route::resource('programas', ProgramaController::class);
Route::resource('materias_docente', MateriaDocenteController::class);
Route::resource('matriculas', MatriculaController::class);


Route::get('/prueba', function () {
    return 'Ruta funcionando';
});
