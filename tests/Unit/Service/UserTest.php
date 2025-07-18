<?php

declare(strict_types=1);

use App\Models\User as UserModel;
use App\Services\User as UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('user service', function () {
    it('should create user', function () {
        $fields = [
            'name' => 'Bijay Das',
            'email' => 'me@bijaydas.com',
            'password' => 'password',
        ];

        $user = app(UserService::class)->create($fields);
        expect($user)->toBeInstanceOf(UserModel::class);
    });
});
