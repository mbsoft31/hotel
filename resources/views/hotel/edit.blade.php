<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit hotel') }}
        </h2>
    </x-slot>

    <div>
        <div class="mt-8 flex items-center justify-center">
            <form class=" px-6 py-2 bg-white rounded-lg shadow-md max-w-md w-full space-y-4" action="{{ route("hotel.update", $hotel) }}" method="POST">

                @csrf

                <div class="flex flex-col space-y-2">
                    <x-input.label for="name" value="Name" />
                    <x-input.text id="name" name="name" :value="$hotel->name" placeholder="{{ __('Name') }}" wire:model="name" />
                    <x-input.error for="name" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="description" value="Description" />
                    <x-input.area id="description" name="description" :placeholder="__('Description')" wire:model="description">
                        {{$hotel->description}}</x-input.area>
                    <x-input.error for="description" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="country" value="Country" />
                    <x-input.text id="country" name="country" :value="$hotel->country" placeholder="{{ __('Country') }}" wire:model="country" />
                    <x-input.error for="country" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="state" value="State" />
                    <x-input.text id="state" name="state" :value="$hotel->state" placeholder="{{ __('State') }}" wire:model="state" />
                    <x-input.error for="state" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-input.label for="address" value="Address" />
                    <x-input.area id="address" name="address" placeholder="{{ __('Address') }}" wire:model="address">{{$hotel->address}}</x-input.area>
                    <x-input.error for="address" />
                </div>

                <div class="flex flex-col space-y-2">
                    <button class="inline-block px-4 py-2 border rounded shadow text-white bg-green-500 focus:ring-green-600 hover:bg-green-600 focus:outline-none focus:ring-2 " type="submit">{{ __("Edit") }}</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
