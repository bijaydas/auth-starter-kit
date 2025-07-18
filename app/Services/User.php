<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User
{
    public function create(array $fields): UserModel
    {
        $user = UserModel::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        return $user;
    }
}
