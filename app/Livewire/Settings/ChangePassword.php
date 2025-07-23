<?php

declare(strict_types=1);

namespace App\Livewire\Settings;

use App\Services\User as UserService;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Validate('required|min:8')]
    public string $currentPassword = '';

    #[Validate('required|min:8')]
    public string $newPassword = '';

    #[Validate('required|min:8|confirmed:newPassword')]
    public string $confirmPassword = '';

    public function submit(): void
    {
        $this->validate();

        try {

            $service = app(UserService::class);

            /**
             * Check if current valid password
             */
            if (! $service->isValidCurrentPassword(auth()->user(), $this->currentPassword)) {
                throw new \Exception('Invalid current password');
            }

            $service->updatePassword(auth()->user(), [
                'password' => $this->newPassword,
            ]);

            session()->flash('success', 'Password updated successfully');

        } catch (\Exception $e) {
            $this->addError('change-password', $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.settings.change-password')
            ->layoutData([
                'title' => 'Password',
                'heading' => 'Change Password',
            ]);
    }
}
