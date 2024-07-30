<?php

use App\Http\Modules\MedicalSpecialities\Controllers\MedicalSpecialityController;
use App\Http\Modules\users\Controllers\UserController;
use App\Http\Modules\Patients\Controllers\PatientController;
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


// Medical specialities
Route::controller(MedicalSpecialityController::class)->group(function () {
    Route::get('/MedicalSpecialities', 'index')->name('medical-specialities');
    Route::get('/MedicalSpecialities/form', 'create')->name('create-speciality');
    Route::post('/MedicalSpecialities', 'store')->name('medical-specialities.store');
    Route::get('/MedicalSpecialities/form/{id}', 'edit')->name('medical-specialities.edit');
    Route::put('/MedicalSpecialities/form/{id}', 'update')->name('medical-specialities.update');
    Route::delete('/MedicalSpecialities/{id}', 'destroy')->name('medical-specialities.destroy');
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


//
//Route::get('/especialidades-medicas', function () {
//    return view('MedicalSpecialities.index');
//})->name('medical-specialities');
//
//Route::get('/medical-speciality/create', function () {
//    return view('MedicalSpecialities.create');
//})->name('create-speciality');


// Reports
Route::get('/reports', function () {
    return view('reports.index');
})->name('reports');


//Users
Route::get('/users', function () {
    return view('users.index');
})->name('users');


// users
Route::controller(UserController::class)->group(function () {
    Route::get('/Users', 'index')->name('users');
    Route::get('/Users/form', 'create')->name('create-user');
    Route::post('/Users', 'store')->name('users.store');
    Route::get('/Users/form/{id}', 'edit')->name('users.edit');
    Route::put('/Users/form/{id}', 'update')->name('users.update');
    Route::delete('/Users/{id}', 'destroy')->name('users.destroy');
//});

// users
//Route::controller(UserController::class)->group(function () {
//    Route::get('/Users', 'index')->name('users');
//    Route::get('/Users/form', 'create')->name('create-user');
//    Route::post('/Users', 'store')->name('users.store');
//    Route::get('/Users/form/{user}', 'edit')->name('users.edit');
//    Route::put('/Users/form/{user}', 'update')->name('users.update');
//    Route::delete('/Users/{user}', 'destroy')->name('users.destroy');
});





Route::get('/users/crear', function () {
    return view('users.create');
})->name('create-user');


