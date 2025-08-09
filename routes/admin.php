<?php

declare(strict_types=1);

use App\Livewire\Admin\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/user', UserIndex::class)->name('user.index');
});
