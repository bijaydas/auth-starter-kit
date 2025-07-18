<flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <flux:brand href="{{ route('home', ['ref' => 'logo']) }}" logo="https://res.cloudinary.com/bijaydas/image/upload/v1752842493/bijaydas.com/large-icon_rijfid.png" name="Das Inc." class="px-2" />

    <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />

    <flux:navlist variant="outline">
        <flux:navlist.item icon="home" href="{{ route('home', ['ref' => 'sidenav']) }}" current>Home</flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile avatar="https://res.cloudinary.com/bijaydas/image/upload/v1752843411/bijaydas.com/photo_fnblgy.png" name="{{ auth()->user()->getUserName() }}" />

        <flux:menu>
            <flux:menu.item icon="arrow-right-start-on-rectangle">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
