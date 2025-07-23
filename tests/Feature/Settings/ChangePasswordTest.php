<?php

declare(strict_types=1);

use App\Livewire\Settings\ChangePassword;
use App\Models\User as UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('change password', function () {

    $this->seed();

    UserModel::factory(1)->create();

    Livewire::actingAs(UserModel::first())
        ->test(ChangePassword::class)
        ->set('currentPassword', 'password')
        ->set('newPassword', 'password1')
        ->set('confirmPassword', 'password1')
        ->call('submit')
        ->assertSessionHasNoErrors();
});

it('error if current password is wrong', function () {

    $this->seed();

    UserModel::factory(1)->create();

    Livewire::test(ChangePassword::class)
        ->set('currentPassword', 'fake')
        ->set('newPassword', 'password1')
        ->set('confirmPassword', 'password1')
        ->call('submit')
        ->assertHasErrors(['currentPassword']);
});

it('error if new password is not confirmed', function () {

    $this->seed();

    UserModel::factory(1)->create();

    Livewire::test(ChangePassword::class)
        ->set('currentPassword', 'password')
        ->set('newPassword', 'password1')
        ->set('confirmPassword', 'password2')
        ->call('submit')
        ->assertHasErrors(['confirmPassword']);
});
