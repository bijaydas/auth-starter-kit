<?php

declare(strict_types=1);

use App\Livewire\Home;
use App\Livewire\Settings\ChangePassword;
use App\Livewire\Settings\EditProfile;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/auth.php';
require_once __DIR__.'/admin.php';

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/profile', EditProfile::class)->name('profile');
        Route::get('/password', ChangePassword::class)->name('password');
    });
});
