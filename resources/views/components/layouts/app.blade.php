@props(['title' => null, 'heading' => null, 'description' => null])

<x-layouts.root title="{{ $title }}">
    <x:layouts.header />
    <x:layouts.sidenav />

    <flux:main>
        @if($title)
        <flux:heading size="xl" level="1">{{ $heading }}</flux:heading>
        @endif

        @if($description)
        <flux:text class="mb-6 mt-2 text-base">{{ $description }}</flux:text>
        @endif

        @if($heading || $description)
        <flux:separator variant="subtle" class="my-3" />
        @endif

        {{ $slot }}
    </flux:main>
</x-layouts.root>
