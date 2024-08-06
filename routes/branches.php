<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('companies/{company}')->group(function () {
    Route::resource('branches', BranchController::class)->names([
        'index' => 'companies.branches.index',
        'create' => 'companies.branches.create',
        'store' => 'companies.branches.store',
        'show' => 'companies.branches.show',
        'edit' => 'companies.branches.edit',
        'update' => 'companies.branches.update',
        'destroy' => 'companies.branches.destroy',
    ]);

    // Appointment routes
    Route::get('branches/{branch}/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('branches/{branch}/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('branches/{branch}/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    // Worker routes
    Route::get('workers', [WorkerController::class, 'index'])->name('workers.index');
    Route::get('workers/create', [WorkerController::class, 'create'])->name('workers.create');
    Route::post('workers', [WorkerController::class, 'store'])->name('workers.store');
    Route::get('workers/{worker}', [WorkerController::class, 'show'])->name('workers.show');
    Route::get('workers/{worker}/edit', [WorkerController::class, 'edit'])->name('workers.edit');
    Route::put('workers/{worker}', [WorkerController::class, 'update'])->name('workers.update');
    Route::delete('workers/{worker}', [WorkerController::class, 'destroy'])->name('workers.destroy');
});
