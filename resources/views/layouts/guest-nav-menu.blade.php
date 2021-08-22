<x-menu.menu class="space-y-1 divide-y">
    <x-menu.item class="group space-x-3">
        <i class="fas fa-folder-plus text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("room.search") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Create a new reservation") }}
        </a>
    </x-menu.item>
    <x-menu.item class="group space-x-3">
        <i class="fas fa-hotel text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("guest.reservation.index") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Reservations") }}
        </a>
    </x-menu.item>
</x-menu.menu>
