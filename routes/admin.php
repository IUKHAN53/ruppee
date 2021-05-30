<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

