<div class="min-h-screen">


    <!-- Header -->
    <x-layout.header.sticky class="h-16">
        {{ $header ?? '' }}
    </x-layout.header.sticky>

    <main class="flex">

        <x-menu.menu>
            <x-menu.item>
                {{ __("Hotels") }}
            </x-menu.item>
            <x-menu.item>
                {{ __("Receptionists") }}
            </x-menu.item>
            <x-menu.item>
                {{ __("Guests") }}
            </x-menu.item>
        </x-menu.menu>

        <!-- Main -->
        <div class="flex-1 px-6 py-4 overflow-auto">
            {{ $slot }}
        </div>
    </main>
</div>
