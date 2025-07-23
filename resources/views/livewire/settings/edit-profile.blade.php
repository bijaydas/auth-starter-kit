<x-layouts.settings>

    <form wire:submit="submit" class="w-1/2">
        <flux:input type="text" label="Name" wire:model="name" />

        <div class="flex justify-end items-center mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
        </div>

        @include('shared.form-feedback')
    </form>

</x-layouts.settings>
