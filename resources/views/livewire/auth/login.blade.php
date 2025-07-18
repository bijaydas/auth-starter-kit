<div class="bg-zinc-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md flex flex-col gap-4">
        <div>
            <flux:heading size="xl">Login</flux:heading>
            <flux:heading size="sm">Get back to your account</flux:heading>
        </div>
        <form wire:submit="submit" class="flex flex-col gap-4">
            <flux:input wire:model="email" name="email" label="Email" type="email" />
            <flux:input wire:model="password" name="password" label="Password" type="password"/>
            <flux:button type="submit" variant="primary" class="w-full cursor-pointer">Login</flux:button>

            <flux:separator />

            <flux:button href="{{ route('signup') }}" variant="ghost" icon-trailing="arrow-up-right" class="cursor-pointer">Don&apos;t have an account?</flux:button>
        </form>

        @include('shared.form-feedback')
    </div>
</div>
