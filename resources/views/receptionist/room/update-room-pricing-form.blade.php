<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Room Pricing") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="py-4 space-y-3">
            <x-input.label for="room_price_x_person">{{__("Price for x person(s)")}}</x-input.label>
            <x-input.text wire:model="state.room_price_x_person" id="room_price_x_person" name="room_price_x_person" class="w-full" placeholder="Price for x person(s)"/>
            <x-input.error for="room_price_x_person"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="room_price_currency">{{__("Currency")}}</x-input.label>
            <select wire:model="state.room_price_currency" id="room_price_currency" name="room_price_currency" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full">
                <option selected>{{ __("Please select a currency") }}</option>
                @foreach($currencies as $k => $v)
                    <option value="{{ $k }}">{{ $v }}</option>
                @endforeach
            </select>
            <x-input.error for="room_price_currency"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="discount_available" class="inline-flex items-center space-x-3">
                <input type="checkbox" wire:model="state.discount_available" id="discount_available" name="discount_available"/>
                <span>{{__("Is discount available ?")}}</span>
            </x-input.label>

            <x-input.error for="discount_available"></x-input.error>
        </div>

        @if(isset($state["discount_available"]) && $state["discount_available"])
            <div class="py-4 space-y-3">
                <x-input.label for="room_discount_x_person">{{__("Discount for x person(s)")}}</x-input.label>
                <x-input.text wire:model="state.room_discount_x_person" id="room_discount_x_person" name="room_discount_x_person" class="w-full" placeholder="Discount for x person(s)"/>
                <x-input.error for="room_discount_x_person"></x-input.error>
            </div>

            <div class="py-4 space-y-3">
                <x-input.label for="room_discount_x_person_type">{{__("Discount type")}}</x-input.label>
                <select wire:model="state.room_discount_x_person_type" id="room_discount_x_person_type" name="room_discount_x_person_type" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full">
                    <option selected>{{ __("Please select a discount type") }}</option>
                    @foreach($discountTypes as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
                <x-input.error for="room_discount_x_person_type"></x-input.error>
            </div>
        @endif
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
