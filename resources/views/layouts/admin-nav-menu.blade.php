<x-menu.menu class="space-y-1 divide-y">
    <x-menu.item class="group space-x-3">
        <i class="fas fa-hotel text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("admin.hotel.index") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Hotels") }}
        </a>
    </x-menu.item>
    <x-menu.item class="group space-x-3">
        <i class="fas fa-user-shield text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("admin.receptionist.index") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Receptionist") }}
        </a>
    </x-menu.item>
    <x-menu.item class="group space-x-3">
        <i class="fas fa-user-friends text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="#" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Guests") }}
        </a>
    </x-menu.item>
</x-menu.menu>
