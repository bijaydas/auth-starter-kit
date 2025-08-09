<?php

declare(strict_types=1);

namespace App\Console\Commands\Admin;

use App\Services\User as UserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    protected $signature = 'app:create-user {--email=} {--name=} {--password=}';

    protected $description = 'Create a new user';

    public function handle(): void
    {
        $email = $this->option('email');
        $name = $this->option('name');
        $password = $this->option('password');

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
            ], [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'name' => 'nullable|string|max:255',
            ], [
                'email.unique' => 'Email already exists.',
            ])->validate();

            $service = app(UserService::class);

            $service->create([
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'name' => $validatedData['name'] ?? null,
            ]);

            $this->info('User created successfully.');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
