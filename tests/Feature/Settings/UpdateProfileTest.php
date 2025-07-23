<?php

declare(strict_types=1);

use App\Livewire\Settings\EditProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('error if name is < 3 characters', function () {

    $this->seed();

    User::factory(1)->create();

    Livewire::actingAs(User::first())
        ->test(EditProfile::class)
        ->set('name', 'ab')
        ->call('submit')
        ->assertHasErrors(['name']);

});

it('update profile', function () {

    $this->seed();

    User::factory(1)->create();

    Livewire::actingAs(User::first())
        ->test(EditProfile::class)
        ->set('name', 'Bijay Das')
        ->call('submit');

    $this->assertDatabaseHas('users', [
        'name' => 'Bijay Das',
    ]);

});
