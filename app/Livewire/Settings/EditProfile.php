<?php

declare(strict_types=1);

namespace App\Livewire\Settings;

use App\Services\User as UserService;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditProfile extends Component
{
    #[Validate('nullable|min:3')]
    public string $name = '';

    public function mount(): void
    {
        $this->name = auth()->user()->name;
    }

    public function submit(): void
    {
        $this->validate();

        try {

            app(UserService::class)->update(auth()->user(), [
                'name' => $this->name,
            ]);

            session()->flash('success', 'Profile updated successfully');

        } catch (\Exception $e) {
            $this->addError('edit-profile', $e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.settings.edit-profile')
            ->layoutData([
                'title' => 'Edit Profile',
                'heading' => 'Edit Profile',
            ]);
    }
}
