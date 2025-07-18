<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\SignUp;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/signup', SignUp::class)->name('signup');
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
});
