<?php

use App\Http\modules\Patients\Controllers\PatientController;
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

// Patients
Route::controller(PatientController::class)->group(function (){
    Route::get('/patients', 'index')->name('patients');
    Route::get('/patients/form', 'create')->name('create-patient');
    Route::post('/patients', 'store')->name('patients.store');
    Route::get('/patients/form/{id}', 'edit')->name('patients.edit');
    Route::put('/patients/form/{id}', 'update')->name('patients.update');
    Route::delete('/patients/{id}', 'destroy')->name('patients.destroy');
});




// Doctors
Route::get('/doctors', function () {
    return view('doctors.index');
})->name('doctors');

Route::get('/doctors/create', function () {
    return view('doctors.create');
})->name('create-doctor');


//Medical appointments
Route::get('/medical-appointments', function () {
    return view('medical_appointments.index');
})->name('medical-appointments');

Route::get('/medical-appointment/create', function () {
    return view('medical_appointments.create');
})->name('create-appointment');



Route::get('/especialidades-medicas', function () {
    return view('medical_speciality.index');
})->name('medical-specialities');

Route::get('/medical-speciality/create', function () {
    return view('medical_speciality.create');
})->name('create-speciality');


// Reports
Route::get('/reports', function () {
    return view('reports.index');
})->name('reports');


//Users
Route::get('/users', function () {
    return view('users.index');
})->name('users');

Route::get('/users/crear', function () {
    return view('users.create');
})->name('create-user');


