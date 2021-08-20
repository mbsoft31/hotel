<x-main-layout>

    <x-slot name="title">
        {{ __("Edit room") }}
    </x-slot>

    <x-slot name="header">
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-6 space-y-3">
                <div class="text-xl font-semibold tracking-wider text-gray-800">
                    {{ $hotel->name }}
                </div>
                <div class="inline-flex space-x-1">
                    @for($i = 0; $i < $hotel->stars; $i = $i + 1)
                        <span class="text-yellow-400">
                            <i class="fas fa-star fa-lg"></i>
                        </span>
                    @endfor
                </div>
            </div>
        </div>
    </x-slot>

    <div class="mt-6">
        @livewire("receptionist.update-room-information-form", compact("receptionist", "hotel", "room"))
    </div>

    <div class="mt-6">
        @livewire("receptionist.update-room-pricing-form", compact("receptionist", "hotel", "room"))
    </div>

    <div class="mt-6">
        @livewire("receptionist.update-room-beds-form", compact("receptionist", "hotel", "room"))
    </div>


</x-main-layout>
