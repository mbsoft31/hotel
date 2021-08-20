<x-main-layout>
    <x-slot name="title">
        {{ __("All Reservations") }}
    </x-slot>

    <div class="mt-8 py-4 px-6">
        <div class="flex items-center justify-end py-4">
            <a href="{{ route("admin.hotel.create") }}" class="px-2 py-1.5 rounded-md shadow bg-blue-400 hover:bg-blue-600 text-gray-50 hover:white ">
                {{ __("Create new Hotel") }}
            </a>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="py-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                        {{--<div class="flex items-center px-6 py-2 space-x-3">
                            <div>
                                {{ __("Filters") }}
                            </div>
                            <div class="">
                                <div
                                    x-data="{open: false, openDropdown(){this.open = true;}, closeDropdown(){ this.open = false; }, toggleDropdown(){ this.open = ! this.open; }, }"
                                    class="inline-block relative"
                                >
                                    <button @click="openDropdown()" class="px-2 py-1.5 text-gray-500 border rounded-md hover:text-gray-700 hover:bg-gray-50">
                                        {{ __("Stars") }}
                                    </button>
                                    <x-menu.menu
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        @click.away="closeDropdown()"
                                        class="absolute top-full left-0 w-64 px-2 py-1.5 bg-white border rounded-md" style="display: none;"
                                    >
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>none</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>1 star(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>2 star(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>3 star(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>4 star(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>5 star(s)</button>
                                        </x-menu.item>
                                    </x-menu.menu>
                                </div>
                                <div
                                    x-data="{open: false, openDropdown(){this.open = true;}, closeDropdown(){ this.open = false; }, toggleDropdown(){ this.open = ! this.open; }, }"
                                    class="inline-block relative"
                                >
                                    <button @click="openDropdown()" class="px-2 py-1.5 text-gray-500 border rounded-md hover:text-gray-700 hover:bg-gray-50">
                                        {{ __("Receptionist count") }}
                                    </button>
                                    <x-menu.menu
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        @click.away="closeDropdown()"
                                        class="absolute top-full left-0 w-64 px-2 py-1.5 bg-white border rounded-md" style="display: none;"
                                    >
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>none</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>1 receptionist</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>2 receptionist(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>3 receptionist(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>4 receptionist(s)</button>
                                        </x-menu.item>
                                        <x-menu.item class="px-2 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                                            <button>5 receptionist(s)</button>
                                        </x-menu.item>
                                    </x-menu.menu>
                                </div>
                            </div>
                        </div>--}}
                        <x-table id="hotel_table">
                            <thead class="bg-gray-50">
                            <tr>
                                <x-table.th scope="col">#</x-table.th>
                                <x-table.th scope="col">{{ __('Room') }}</x-table.th>
                                <x-table.th scope="col">{{ __('Start') }}</x-table.th>
                                <x-table.th scope="col">{{ __('Nights') }}</x-table.th>
                                <x-table.th scope="col">{{ __('End') }}</x-table.th>
                                <x-table.th scope="col">{{ __('Guest') }}</x-table.th>
                                <x-table.th scope="col">{{ __('State') }}</x-table.th>
                                <x-table.th scope="col">{{ __('Actions') }}</x-table.th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($reservations as $reservation)
                                <tr>
                                    <x-table.td scope="row">{{$reservation->id}}</x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <p>{{$reservation->room->name}}</p>
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <p>{{$reservation->start}}</p>
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <p>{{$reservation->nights}}</p>
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <p>{{$reservation->end}}</p>
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <p>{{$reservation->guest->name}}</p>
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        @if($reservation->state == "accepted")
                                            <p class="uppercase inline py-1 px-2 rounded-lg text-center m-0 text-xs font-semibold tracking-wide bg-purple-50 text-purple-600">{{$reservation->state}}</p>
                                        @elseif($reservation->state == "cancelled")
                                            <p class="uppercase inline py-1 px-2 rounded-lg text-center m-0 text-xs font-semibold tracking-wide bg-red-50 text-red-600">{{$reservation->state}}</p>
                                        @elseif($reservation->state == "passed")
                                            <p class="uppercase inline py-1 px-2 rounded-lg text-center m-0 text-xs font-semibold tracking-wide bg-yellow-50 text-yellow-600">{{$reservation->state}}</p>
                                        @elseif($reservation->state == "checked")
                                            <p class="uppercase inline py-1 px-2 rounded-lg text-center m-0 text-xs font-semibold tracking-wide bg-green-50 text-green-600">{{$reservation->state}}</p>
                                        @else
                                            <p class="uppercase inline py-1 px-2 rounded-lg text-center m-0 text-xs font-semibold tracking-wide bg-gray-50 text-gray-600">{{$reservation->state}}</p>
                                        @endif
                                    </x-table.td>
                                    <x-table.td class="whitespace-normal">
                                        <div class="inline-flex items-center space-x-2">
                                            @livewire("reservation.accept-action", ["reservation" => $reservation])
                                            @livewire("reservation.check-in-action", ["reservation" => $reservation])
                                            <a href="{{ route("receptionist.room.edit", $reservation) }}" class="text-sm text-green-500 hover:text-green-700">{{ __("Edit") }}</a>
                                            <x-modal>
                                                <x-slot name="trigger">
                                                    <button @click="openModal()" class="text-sm text-red-500 hover:text-red-700" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$reservation->id}}">{{ __("Delete") }}</button>
                                                </x-slot>

                                                <div>
                                                    {{ __('do you really want to delete this room?') }}
                                                </div>

                                                <x-slot name="actions">
                                                    <form action="{{ route("receptionist.room.destroy", $reservation) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">{{ __("Delete permanently") }}</button>
                                                    </form>
                                                    <button @click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" data-bs-dismiss="modal">Close</button>
                                                </x-slot>

                                            </x-modal>
                                        </div>
                                    </x-table.td>
                                </tr>
                            @endforeach
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
