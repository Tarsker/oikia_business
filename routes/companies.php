<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::patch('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    Route::get('/companies/{company}/branches', [BranchController::class, 'index'])->name('companies.branches.index');
    Route::get('/companies/{company}/branches/create', [BranchController::class, 'create'])->name('companies.branches.create');
    Route::post('/companies/{company}/branches', [BranchController::class, 'store'])->name('companies.branches.store');
    Route::get('/companies/{company}/branches/{branch}', [BranchController::class, 'show'])->name('companies.branches.show');
    Route::get('/companies/{company}/branches/{branch}/edit', [BranchController::class, 'edit'])->name('companies.branches.edit');
    Route::patch('/companies/{company}/branches/{branch}', [BranchController::class, 'update'])->name('companies.branches.update');
    Route::delete('/companies/{company}/branches/{branch}', [BranchController::class, 'destroy'])->name('companies.branches.destroy');
});
