<?php

use App\Http\Livewire\Analytics;
use App\Http\Livewire\BuyService;
use App\Http\Livewire\CheckWork;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Inbox;
use App\Http\Livewire\Order;
use App\Http\Livewire\Services;
use App\Http\Livewire\ServicesRequest;
use App\Http\Livewire\ServicesSell;
use App\Http\Livewire\SubmitWork;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::group(['auth:sanctum', 'verified'],function (){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/messages',Inbox::class)->name('messages');
    Route::get('/orders',Order::class)->name('orders');
    Route::get('/analytics',Analytics::class)->name('analytics');
    Route::get('/services',Services::class)->name('services');
    Route::get('/sell-services',ServicesSell::class)->name('sell-service');
    Route::get('/request-services',ServicesRequest::class)->name('request-service');
    Route::get('/buy-service/{service_id}',BuyService::class)->name('buy-service');
    Route::get('/submit-work',SubmitWork::class)->name('submit-work');
    Route::get('/check-work',CheckWork::class)->name('checkWork');
});

