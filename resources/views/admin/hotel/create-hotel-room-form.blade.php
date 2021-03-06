<div>

    <div class="py-4 space-y-3">
        <x-input.label for="room_type_id">{{__("Room Type")}}</x-input.label>
        <select wire:model="state.room_type_id" id="room_type_id" name="room_type_id" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full">
            <option selected>{{ __("Please select a room type") }}</option>
            @foreach($roomTypes as $roomType)
                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
            @endforeach
        </select>
        <x-input.error for="room_type_id"></x-input.error>
    </div>

    <div class="py-4 space-y-3">
        <x-input.label for="name">{{__("Num")}}</x-input.label>
        <x-input.text wire:model="state.name" id="name" name="name" class="w-full" placeholder="Room number"/>
        <x-input.error for="name"></x-input.error>
    </div>

    <div class=" py-4  space-y-3">
        <x-input.label for="description">{{ __("Description") }}</x-input.label>
        <x-input.area wire:model="state.description" id="description" name="description" class="w-full"></x-input.area>
        <x-input.error for="description"></x-input.error>
    </div>

    <div class=" py-4  space-y-3">
        <x-input.label for="rooms_count">{{ __("Room count") }}</x-input.label>
        <x-input.number wire:model="state.rooms_count" id="rooms_count" name="rooms_count" class="w-full" placeholder="How many room of this type"></x-input.number>
        <x-input.error for="rooms_count"></x-input.error>
    </div>

    <div class="flex items-center justify-end py-3 text-right">
        <button wire:click="save" type="button" class="px-6 py-2 rounded-md shadow bg-gray-600 text-gray-100 hover:text-white hover:bg-gray-800">
            {{ __("Add room") }}
        </button>
    </div>

</div>
