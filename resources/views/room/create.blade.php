<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Room in ') }} {{ $hotel->name }}
        </h2>
    </x-slot>

    <div>
        <div class="mt-8 flex items-center justify-center">
            <form class=" px-6 py-2 bg-white rounded-lg shadow-md max-w-md w-full space-y-4" action="{{ route("room.store", $hotel) }}" method="POST">

                @csrf

                <div class="flex flex-col space-y-2">
                    <x-input.label for="number" value="Number" />
                    <x-input.number id="number" name="number" placeholder="{{ __('Number') }}" wire:model="number" />
                    <x-input.error for="number" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="phone" value="Phone" />
                    <x-input.number id="phone" name="phone" placeholder="{{ __('Phone') }}" wire:model="phone" />
                    <x-input.error for="phone" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="bed_count" value="Bed count" />
                    <x-input.number id="bed_count" name="bed_count" placeholder="{{ __('Bed count') }}" wire:model="bed_count" />
                    <x-input.error for="bed_count" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="floor_number" value="Floor number" />
                    <x-input.number id="floor_number" name="floor_number" placeholder="{{ __('Floor number') }}" wire:model="floor_number" />
                    <x-input.error for="floor_number" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="description" value="Description" />
                    <x-input.area id="description" name="description" placeholder="{{ __('Description') }}" wire:model="description" />
                    <x-input.error for="description" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="type_id" value="Category" />
                    <x-input.room-type :types="$types" id="type_id" name="type_id" placeholder="{{ __('Category') }}" wire:model="type_id" />
                    <x-input.error for="type_id" />
                </div>

                <div class="flex flex-col space-y-2">
                    <button class="inline-block px-4 py-2 border rounded shadow text-white bg-blue-500 focus:ring-blue-600 hover:bg-blue-600 focus:outline-none focus:ring-2 " type="submit">{{ __("Create") }}</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
