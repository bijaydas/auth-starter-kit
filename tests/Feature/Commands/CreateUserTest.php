<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates user', function () {
    $this->artisan('app:create-user')
        ->expectsQuestion('Enter email', 'me@bijaydas.com')
        ->expectsQuestion('Enter password', 'password')
        ->assertExitCode(0);

    $this->assertDatabaseHas('users', [
        'email' => 'me@bijaydas.com',
    ]);

    $this->artisan('app:create-user')
        ->expectsQuestion('Enter email', 'me@bijaydas.com')
        ->expectsQuestion('Enter password', 'password')
        ->expectsOutput('Email already exists.');

    $this->artisan('app:create-user --email=bijay@bijaydas.com --password=password')
        ->expectsOutput('User created successfully.');
});

it('should not create user if email is not provided', function () {
    $this->artisan('app:create-user')
        ->expectsQuestion('Enter email', '')
        ->expectsQuestion('Enter password', 'password')
        ->expectsOutput('The email field is required.');
});
