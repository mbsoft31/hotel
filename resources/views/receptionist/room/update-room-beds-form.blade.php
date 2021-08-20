<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Room Beds") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="py-4 space-y-3">
            <div class="border rounded-md divide-y">
                @foreach($beds as $bed)
                    <div class="flex items-center px-6 py-4 ">
                        <div class="flex-grow space-y-2">
                            <div>{{ $bed->name }}</div>
                            <div class="text-sm text-gray-500">
                                <span>( {{ $bed->size }} )</span>
                                <span>{{ $bed->capacity }} x </span>
                                <span><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                        <div>
                            <button wire:click="detach({{ $bed }})" type="button" class="text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="bed">{{__("Bed")}}</x-input.label>
            <select wire:model="bed" id="room_type_id" name="room_type_id" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full">
                <option selected>{{ __("Please select a bed") }}</option>
                @foreach($bedTypes as $bedType)
                    <option value="{{ $bedType->id }}">{{ $bedType->name }} - {{ $bedType->size }} - {{ $bedType->capacity }} x person(s)</option>
                @endforeach
            </select>
            <div>
                <button wire:click="attach({{ $bedType }})" type="button">
                    <i class="fas fa-plus"></i>
                    <span>{{ __("Add bed") }}</span>
                </button>
            </div>
            <x-input.error for="room_type_id"></x-input.error>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>
        <button type="submit" class="px-6 py-2 rounded-md shadow bg-gray-600 text-gray-100 hover:text-white hover:bg-gray-800">
            {{ __("Save") }}
        </button>
    </x-slot>
</x-form-section>
