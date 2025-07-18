<?php

declare(strict_types=1);

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');
});
