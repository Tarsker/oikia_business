<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('companies/{company}/branches/{branch}')->group(function () {
        Route::get('appointments', [AppointmentController::class, 'index'])->name('companies.appointments.index');
        Route::get('appointments/create', [AppointmentController::class, 'create'])->name('companies.appointments.create');
        Route::post('appointments', [AppointmentController::class, 'store'])->name('companies.appointments.store');
        Route::get('appointments/{appointment}', [AppointmentController::class, 'show'])->name('companies.appointments.show');
        Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('companies.appointments.edit');
        Route::patch('appointments/{appointment}', [AppointmentController::class, 'update'])->name('companies.appointments.update');
        Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('companies.appointments.destroy');
    });
});
