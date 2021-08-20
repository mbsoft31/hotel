<x-main-layout>

    <x-slot name="title">
        {{ __("All hotels") }}
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
                        <div class="flex items-center px-6 py-2 space-x-3">
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
                        </div>
                        <x-table id="hotel_table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-table.th scope="col">#</x-table.th>
                                    <x-table.th scope="col">{{ __('Name') }}</x-table.th>
                                    <x-table.th scope="col">{{ __('Stars') }}</x-table.th>
                                    <x-table.th scope="col">{{ __('Address') }}</x-table.th>
                                    <x-table.th scope="col">{{ __('Receptionists') }}</x-table.th>
                                    <x-table.th scope="col">{{ __('Actions') }}</x-table.th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($hotels as $hotel)
                                    <tr>
                                        <x-table.td scope="row">{{$hotel->id}}</x-table.td>
                                        <x-table.td class="whitespace-nowrap">
                                            <a href="{{ route("admin.hotel.show", $hotel) }}" class="no-underline">{{$hotel->name}}</a>
                                        </x-table.td>
                                        <x-table.td>
                                            <div class="inline-flex items-center space-x-1">
                                                <span class="text-lg font-semibold">{{$hotel->stars}}</span>
                                                <svg class="inline w-6 h-6 text-yellow-300" viewBox="0 0 32 32" fill="currentColor"><path d="M29.895,12.52c-0.235-0.704-0.829-1.209-1.549-1.319l-7.309-1.095l-3.29-6.984C17.42,2.43,16.751,2,16,2  s-1.42,0.43-1.747,1.122l-3.242,6.959l-7.357,1.12c-0.72,0.11-1.313,0.615-1.549,1.319c-0.241,0.723-0.063,1.507,0.465,2.046  l5.321,5.446l-1.257,7.676c-0.125,0.767,0.185,1.518,0.811,1.959c0.602,0.427,1.376,0.469,2.02,0.114l6.489-3.624l6.581,3.624  c0.646,0.355,1.418,0.311,2.02-0.114c0.626-0.441,0.937-1.192,0.811-1.959l-1.259-7.686l5.323-5.436  C29.958,14.027,30.136,13.243,29.895,12.52z"/></svg>
                                            </div>
                                        </x-table.td>
                                        <x-table.td class="whitespace-normal">
                                            <p>{{$hotel->address}}</p>
                                        </x-table.td>
                                        <x-table.td>
                                            <div>
                                                @foreach($hotel->receptionists as $receptionist)
                                                    <a href="{{ route("admin.receptionist.show", $receptionist) }}" class="no-underline badge rounded-pill bg-primary">{{ $receptionist->name }}</a>
                                                @endforeach
                                            </div>
                                        </x-table.td>
                                        <x-table.td class="whitespace-normal">
                                            <div class="inline-flex items-center space-x-2">
                                                <a href="{{ route("admin.hotel.edit", $hotel) }}" class="text-sm text-green-500 hover:text-green-700">{{ __("Edit") }}</a>
                                                <x-modal>
                                                    <x-slot name="trigger">
                                                        <button @click="openModal()" class="text-sm text-red-500 hover:text-red-700" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$hotel->id}}">{{ __("Delete") }}</button>
                                                    </x-slot>

                                                    <div>
                                                        {{ __('do you really want to delete this hotel?') }}
                                                        {{ $hotel->name }}
                                                    </div>

                                                    <x-slot name="actions">
                                                        <form action="{{ route("admin.hotel.destroy", $hotel) }}" method="POST">
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
