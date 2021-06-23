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
                <div class="w-full px-6 py-2">

                    <div class="flex justify-end items-center px-6 py-2">

                        <a href="{{route("room.create", $hotel)}}" class="block px-2.5 py-2 border rounded-lg shadow-sm text-sm text-gray-100 bg-indigo-600 hover:bg-indigo-600 hover:text-white focus:text-white focus:outline-none focus:ring-indigo-600 focus:ring-2">
                            {{ __('Create new') }}
                        </a>

                    </div>

                    <div class="mt-4">
                        <x-room.table :hotel="$hotel" />
                    </div>

                </div>
            </div>
        </div>


    </div>


</x-app-layout>
