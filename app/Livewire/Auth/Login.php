<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function submit()
    {
        $this->validate();

        try {
            if (! Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                throw new \Exception('Invalid credentials');
            }
            $this->redirectIntended(route('home'));
        } catch (\Exception $e) {
            $this->addError('login', $e->getMessage());
        }
    }

    #[Layout('components.layouts.root')]
    public function render(): View
    {
        return view('livewire.auth.login')
            ->layoutData([
                'title' => 'Login',
            ]);
    }
}
