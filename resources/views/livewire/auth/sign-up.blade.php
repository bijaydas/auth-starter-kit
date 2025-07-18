<div class="bg-zinc-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md flex flex-col gap-4">
        <div>
            <flux:heading size="xl">Sign Up</flux:heading>
            <flux:heading size="sm">Create an account</flux:heading>
        </div>
        <form wire:submit="submit" class="flex flex-col gap-4">
            <flux:input wire:model="name" name="name" label="Name" />
            <flux:input wire:model="email" name="email" label="Email" type="email" />
            <flux:input wire:model="password" name="password" label="Password" type="password"/>

            <flux:button type="submit" variant="primary" class="w-full cursor-pointer">Sign Up</flux:button>

            <flux:separator />

            <flux:button href="{{ route('login') }}" variant="ghost" icon-trailing="arrow-up-right" class="hover:underline">Already have an account?</flux:button>
        </form>

        @include('shared.form-feedback')
    </div>
</div>
