<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/citas-medicas', function () {
    return view('citas_medicas.index');
})->name('citas-medicas');
Route::get('/citas-medicas/crear', function () {
    return view('citas_medicas.crear_cita');
})->name('crear-cita');


Route::get('/pacientes', function () {
    return view('pacientes.index');
})->name('pacientes');
Route::get('/pacientes/crear', function () {
    return view('pacientes.crear_paciente');
})->name('crear-paciente');


Route::get('/medicos', function () {
    return view('medicos.index');
})->name('medicos');
Route::get('/medicos/crear', function () {
    return view('medicos.crear_medico');
})->name('crear-medico');


Route::get('/reportes', function () {
    return view('reportes.index');
})->name('reportes');


Route::get('/configuracion', function () {
    return view('configuracion.index');
})->name('configuracion');


