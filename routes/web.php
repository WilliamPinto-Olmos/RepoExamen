<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::post('estudiante/{estudiante}/addMateria', [EstudianteController::class, 'addMateria'])->name('estudiante.addMateria');
Route::post('estudiante/{estudiante}/deleteMateria', [EstudianteController::class, 'deleteMateria'])->name('estudiante.deleteMateria');

Route::resource('estudiante', EstudianteController::class);
Route::resource('materia', MateriaController::class)->parameters(['materia' => 'materia']);
