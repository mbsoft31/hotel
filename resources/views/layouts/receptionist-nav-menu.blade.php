<x-menu.menu class="space-y-1 divide-y">
    <x-menu.item class="group space-x-3">
        <i class="fas fa-hotel text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("receptionist.room.index") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Hotel Rooms") }}
        </a>
    </x-menu.item>
    <x-menu.item class="group space-x-3">
        <i class="fas fa-folder-plus text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("receptionist.room.create") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Create a new room") }}
        </a>
    </x-menu.item>
    <x-menu.item class="group space-x-3">
        <i class="fas fa-user-friends text-2xl text-gray-500 group-hover:text-gray-900"></i>
        <a href="{{ route("receptionist.reservation.index") }}" class="block flex-grow px-4 py-3 text-gray-600 hover:text-gray-900 hover:bg-gray-50">
            {{ __("Reservations") }}
        </a>
    </x-menu.item>
</x-menu.menu>
