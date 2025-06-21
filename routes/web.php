<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TreatmentController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('patients', PatientController::class);
Route::resource('appointments', AppointmentController::class);
Route::patch('appointments/{id}/status/{status}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

Route::resource('treatments', TreatmentController::class);

