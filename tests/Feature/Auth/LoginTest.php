<?php

declare(strict_types=1);

use App\Livewire\Auth\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('Login', function () {

    it('page is rendered', function () {
        $this->get('/login')->assertOk();
    });

    it('throw email is required', function () {
        Livewire::test(Login::class)
            ->set('email', '')
            ->set('password', '')
            ->call('submit')
            ->assertHasErrors(['email']);
    });

    it('throw password is required', function () {
        Livewire::test(Login::class)
            ->set('email', 'me@bijaydas.com')
            ->set('password', '')
            ->call('submit')
            ->assertHasErrors(['password']);
    });

    it('should login', function () {
        // Create the user
        app(App\Services\User::class)->create([
            'name' => 'Bijay Das',
            'email' => 'me@bijaydas.com',
            'password' => 'password',
        ]);

        LiveWire::test(Login::class)
            ->set('email', 'me@bijaydas.com')
            ->set('password', 'password')
            ->call('submit')
            ->assertRedirect(route('home'));
    });
});
