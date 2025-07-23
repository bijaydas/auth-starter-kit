<div class="flex">
    <div class="w-2/12">
        <flux:navlist>
            <flux:navlist.group heading="Settings">
                <flux:navlist.item href="{{ route('settings.profile') }}">Profile</flux:navlist.item>
                <flux:navlist.item href="{{ route('settings.password') }}">Change password</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
    </div>

    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
