<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\RegistrationController;
use App\Http\Controllers\Guest\TrackerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest / Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [RegistrationController::class, 'landing'])->name('landing');
Route::get('/register', [RegistrationController::class, 'showRegister'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/register/success', [RegistrationController::class, 'success'])->name('register.success');
Route::get('/track', [TrackerController::class, 'index'])->name('track');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Protected Admin Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/registrations/{registration}/status', [DashboardController::class, 'updateStatus'])->name('registrations.status');
    Route::delete('/registrations/{registration}', [DashboardController::class, 'destroy'])->name('registrations.destroy');
});
