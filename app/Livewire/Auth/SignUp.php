<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Services\User as UserService;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SignUp extends Component
{
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8')]
    public string $password = '';

    public function submit(): void
    {
        $this->validate();

        try {
            $user = (new UserService())->create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);

            auth()->login($user);

            $this->redirectIntended(route('home'));
        } catch (\Exception $e) {
            $this->addError('signup', $e->getMessage());
        }
    }

    #[Layout('components.layouts.root')]
    public function render(): View
    {
        return view('livewire.auth.sign-up')
            ->layoutData([
                'title' => 'Sign Up',
            ]);
    }
}
