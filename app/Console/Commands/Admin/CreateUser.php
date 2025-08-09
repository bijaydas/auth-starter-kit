<?php

declare(strict_types=1);

namespace App\Console\Commands\Admin;

use App\Enums\UserRole;
use App\Services\User as UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateUser extends Command
{
    protected $signature = 'app:create-user {--email=} {--name=} {--password=} {--role=}';

    protected $description = 'Create a new user';

    public function handle(): void
    {
        $email = $this->option('email');
        $name = $this->option('name');
        $password = $this->option('password');
        $role = $this->option('role');

        if (! $email) {
            $email = $this->ask('Enter email');
        }

        if (! $password) {
            $password = $this->secret('Enter password');
        }

        try {
            $validatedData = Validator::make([
                'email' => $email,
                'password' => $password,
                'name' => $name,
                'role' => $role,
            ], [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'name' => 'nullable|string|max:255',
                'role' => Rule::in(UserRole::getValues()),
            ], [
                'email.unique' => 'Email already exists.',
            ])->validate();

            $service = app(UserService::class);

            $service->create([
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'name' => $validatedData['name'] ?? null,
                'role' => $validatedData['role'] ?? UserRole::USER->value,
            ]);

            $this->info('User created successfully.');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
