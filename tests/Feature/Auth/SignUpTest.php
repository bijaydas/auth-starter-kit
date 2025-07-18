<?php

declare(strict_types=1);

use App\Livewire\Auth\SignUp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('SignUp', function () {
    it('page is rendered', function () {
        $this->get('/signup')->assertOk();
    });

    it('should throw invalid email error', function () {
        Livewire::test(SignUp::class)
            ->set('name', 'foo')
            ->set('email', 'fake')
            ->set('password', 'password')
            ->call('submit')
            ->assertHasErrors(['email']);
    });

    it('should throw invalid password error', function () {
        Livewire::test(SignUp::class)
            ->set('name', 'foo')
            ->set('email', fake()->unique()->safeEmail())
            ->set('password', '')
            ->call('submit')
            ->assertHasErrors(['password']);
    });

    it('create user', function () {

        $email = 'me@bijaydas.com';

        Livewire::test(SignUp::class)
            ->set('name', 'Bijay Das')
            ->set('email', $email)
            ->set('password', 'password')
            ->call('submit')
            ->assertRedirect(route('home'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);

        Livewire::test(SignUp::class)
            ->set('name', 'Bijay Das')
            ->set('email', $email)
            ->set('password', 'password')
            ->call('submit')
            ->assertHasErrors(['email']);
    });
});
