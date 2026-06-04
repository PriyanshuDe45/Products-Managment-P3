<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\companiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    Route::get('/companies', [companiesController::class, 'index'])->name('company.index');
    Route::get('/companies/deactivated', [companiesController::class, 'deactivated'])->name('company.deactivated');
    Route::get('/companies/create', [companiesController::class, 'create'])->name('company.create');
    Route::post('/companies', [companiesController::class, 'store'])->name('company.store');
    Route::get('/companies/{company}', [companiesController::class, 'show'])->name('company.show');
    Route::get('/companies/{company}/edit', [companiesController::class, 'edit'])->name('company.edit');
    Route::put('/companies/{company}', [companiesController::class, 'update'])->name('company.update');
    Route::post('/companies/{company}/deactivate', [companiesController::class, 'deactivate'])->name('company.deactivate');
});
