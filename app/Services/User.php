<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\UserRole;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User
{
    public function create(array $fields): UserModel
    {
        if (isset($fields['role'])) {
            $fields['role'] = UserRole::from($fields['role']);
        } else {
            $fields['role'] = UserRole::USER->value;
        }

        $user = UserModel::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $user->assignRole($fields['role']);

        return $user;
    }

    public function update(UserModel $user, $fields): bool
    {
        return $user->update($fields);
    }

    public function updatePassword(UserModel $user, $fields): bool
    {
        return $user->update([
            'password' => Hash::make($fields['password']),
        ]);
    }

    public function isValidCurrentPassword(UserModel $user, string $password): bool
    {
        return Hash::check($password, $user->password);
    }
}
