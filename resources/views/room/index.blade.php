<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }} {{ __('of') }} {{ $hotel->name }}
        </h2>
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </x-slot>

    <div>

        <div class="mt-8 flex items-center justify-center">

            <div class="w-full max-w-5xl mx-auto">
                <div class="w-full px-6 py-2 bg-white rounded-md shadow-md">

                    <div class="flex justify-end items-center px-6 py-2">

                        <a href="{{route("room.create", $hotel)}}" class="block px-4 py-2 border rounded shadow text-gray-100 bg-blue-500 hover:bg-blue-600 hover:text-white focus:text-white focus:outline-none focus:ring-blue-600 focus:ring-2">
                            {{ __('Create new') }}
                        </a>

                    </div>

                    <div class="mt-4">
                        <x-room.table :hotel="$hotel" />
                    </div>

                    <div class="mt-4 flex justify-end items-center px-6 py-2">
                        <a href="{{route("hotel.create")}}" class="block px-4 py-2 border rounded shadow text-gray-100 bg-blue-500 hover:bg-blue-600 hover:text-white focus:text-white focus:outline-none focus:ring-blue-600 focus:ring-2">
                            {{ __('Create new') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>


    </div>


</x-app-layout>
