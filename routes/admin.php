<?php

use App\Http\Controllers\admin\DisputeController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

//Service
Route::get('/services', [ServicesController::class, 'index'])->name('admin-services');
Route::get('/services/create', [ServicesController::class, 'create'])->name('admin-services-create');
Route::get('/services/view', [ServicesController::class, 'show'])->name('admin-service-show');
Route::get('/services/edit/{id}', [ServicesController::class, 'edit'])->name('admin-service-edit');
Route::post('/services/edit/{id}', [ServicesController::class, 'update'])->name('admin-service-update');
Route::post('/services/create', [ServicesController::class, 'store'])->name('admin-service-store');
Route::get('/services/delete/{id}', [ServicesController::class, 'destroy'])->name('admin-service-delete');

//Users
Route::get('/users', [UserController::class, 'index'])->name('admin-users');
Route::get('/users/create', [UserController::class, 'create'])->name('admin-user-create');
Route::get('/users/view', [UserController::class, 'show'])->name('admin-user-show');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin-user-edit');
Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('admin-user-update');
Route::post('/users/create', [UserController::class, 'store'])->name('admin-user-store');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin-user-delete');

//Disputes
Route::get('/disputes', [DisputeController::class, 'index'])->name('admin-disputes');
//Route::get('/disputes/create', [DisputeController::class, 'create'])->name('admin-disputes-create');
//Route::get('/disputes/view', [DisputeController::class, 'show'])->name('admin-dispute-show');
//Route::get('/disputes/edit/{id}', [DisputeController::class, 'edit'])->name('admin-dispute-edit');
Route::get('/disputes/resolve', [DisputeController::class, 'resolveDispute'])->name('admin-dispute-resolve');
//Route::post('/disputes/edit/{id}', [DisputeController::class, 'update'])->name('admin-dispute-update');
//Route::post('/disputes/create', [DisputeController::class, 'store'])->name('admin-dispute-store');
//Route::get('/disputes/delete/{id}', [DisputeController::class, 'destroy'])->name('admin-dispute-delete');

//Profile
Route::get('/profile', [DashboardController::class, 'edit_profile'])->name('admin-profile-edit');
Route::post('/profile', [DashboardController::class, 'update_profile'])->name('admin-profile-update');
