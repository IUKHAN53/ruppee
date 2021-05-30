<?php

use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::get('/services', [ServicesController::class, 'index'])->name('admin-services');
Route::get('/services/create', [ServicesController::class, 'create'])->name('admin-services-create');

