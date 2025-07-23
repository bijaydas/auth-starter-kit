<x-layouts.settings>

    <form wire:submit="submit" class="w-1/2 grid grid-cols-1 gap-4">
        <flux:input type="password" wire:model="currentPassword" label="Current Password" />
        <flux:input type="password" wire:model="newPassword" label="Password" />
        <flux:input type="password" wire:model="confirmPassword" label="Confirm Password" />

        <div class="flex justify-end items-center mt-4">
            <flux:button type="submit" class="cursor-pointer" variant="primary">Update</flux:button>
        </div>

        @include('shared.form-feedback')
    </form>

</x-layouts.settings>
