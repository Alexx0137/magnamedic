<?php

use App\Http\Modules\Auth\Controllers\LoginController;
use App\Http\Modules\Dashboard\Controllers\DashboardController;
use App\Http\Modules\Doctors\Controllers\DoctorController;
use App\Http\Modules\MedicalAppointments\Controllers\MedicalAppointmentController;
use App\Http\Modules\MedicalSpecialities\Controllers\MedicalSpecialityController;
use App\Http\Modules\Patients\Controllers\PatientController;
use App\Http\Modules\users\Controllers\UserController;
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
    return redirect('/login');
});

Route::view('login', 'login')->name('login')->middleware('guest');

Route::view('/dashboard', 'dashboard')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/users/form', 'create')->name('create-user');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/form/{id}', 'edit')->name('users.edit');
        Route::put('/users/form/{id}', 'update')->name('users.update');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    });

    // Patients
    Route::controller(PatientController::class)->group(function () {
        Route::get('/patients', 'index')->name('patients');
        Route::get('/patients/form', 'create')->name('create-patient');
        Route::post('/patients', 'store')->name('patients.store');
        Route::get('/patients/form/{id}', 'edit')->name('patients.edit');
        Route::put('/patients/form/{id}', 'update')->name('patients.update');
        Route::delete('/patients/{id}', 'destroy')->name('patients.destroy');
        // routes/web.php
        Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');


    });

    // Medical specialities
    Route::controller(MedicalSpecialityController::class)->group(function () {
        Route::get('/medical-specialities', 'index')->name('medical-specialities');
        Route::get('/medical-specialities/form', 'create')->name('create-speciality');
        Route::post('/medical-specialities', 'store')->name('medical-specialities.store');
        Route::get('/medical-specialities/form/{id}', 'edit')->name('medical-specialities.edit');
        Route::put('/medical-specialities/form/{id}', 'update')->name('medical-specialities.update');
        Route::delete('/medical-specialities/{id}', 'destroy')->name('medical-specialities.destroy');
    });

    // Doctors
    Route::controller(DoctorController::class)->group(function () {
        Route::get('/doctors', 'index')->name('doctors');
        Route::get('/doctors/form', 'create')->name('create-doctor');
        Route::post('/doctors', 'store')->name('doctors.store');
        Route::get('/doctors/form/{id}', 'edit')->name('doctors.edit');
        Route::put('/doctors/form/{id}', 'update')->name('doctors.update');
        Route::delete('/doctors/{id}', 'destroy')->name('doctors.destroy');
    });


    // Medical appointments
    Route::controller(MedicalAppointmentController::class)->group(function () {
        Route::get('/medical-appointments', 'index')->name('medical-appointments');
        Route::get('/medical-appointments/form', 'create')->name('create-appointment');
        Route::post('/medical-appointments', 'store')->name('medical-appointments.store');
        Route::get('/medical-appointments/form/{id}', 'edit')->name('medical-appointments.edit');
        Route::put('/medical-appointments/form/{id}', 'update')->name('medical-appointments.update');
        Route::delete('/medical-appointments/{id}', 'destroy')->name('medical-appointments.destroy');
//        Route::get('/patients/search', [MedicalAppointmentController::class, 'searchPatients'])->name('patients.search');


    });


    // Reports
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports');
});
