<x-form-section submit="updateHotelInformation">
    <x-slot name="title">
        {{ __("Hotel Informations") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">
        <div class="py-4 space-y-3">
            <x-input.label for="name">{{__("Name")}}</x-input.label>
            <x-input.text wire:model="state.name" id="name" name="name" class="w-full" placeholder="Hotel name"/>
            <x-input.error for="name"></x-input.error>
        </div>

        <div class=" py-4 space-y-3">
            <x-input.label for="stars">{{__("Stars")}}</x-input.label>
            <select
                wire:model="state.stars"
                id="stars"
                name="stars"
                class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md"
            >
                <option value="1">{{ "1 star" }}</option>
                <option value="2">{{ "2 star" }}</option>
                <option value="3">{{ "3 star" }}</option>
                <option value="4">{{ "4 star" }}</option>
                <option value="5">{{ "5 star" }}</option>
            </select>
            <x-input.error for="stars"></x-input.error>
        </div>

        <div class=" py-4  space-y-3">
            <x-input.label for="description">{{ __("Description") }}</x-input.label>
            <x-input.area wire:model="state.description" id="description" name="description" class="w-full"></x-input.area>
            <x-input.error for="description"></x-input.error>
        </div>

        <div class=" py-4 space-y-3">
            <x-input.label for="address">{{ __("Address") }}</x-input.label>
            <x-input.text wire:model="state.address" id="address" name="address" class="w-full" />
            <x-input.error for="address"></x-input.error>
        </div>

        <div class=" flex flex-nowrap items-center gap-4 mb-3 py-4">
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="country">{{__("Country")}}</x-input.label>
                    <select wire:model="state.country" id="country" name="country" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full">
                        @foreach($countries as $code => $name)
                            <option value="{{$code}}" @if($code ==="DZ") selected @endif>{{ $code . " - " .$name }}</option>
                        @endforeach
                    </select>
                    <x-input.error for="country"></x-input.error>
                </div>
            </div>
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="city">{{__("City")}}</x-input.label>
                    <x-input.text wire:model="state.city" id="city" name="city" class="w-full" />
                    <x-input.error for="city"></x-input.error>
                </div>
            </div>
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="zipcode">{{__("Zipcode")}}</x-input.label>
                    <x-input.text wire:model="state.zipcode" id="zipcode" name="zipcode" class="w-full" />
                    <x-input.error for="zipcode"></x-input.error>
                </div>
            </div>
        </div>

        <div class=" flex flex-nowrap items-center gap-4 py-4">
            <div class="w-1/2">
                <div class="space-y-3">
                    <x-input.label for="contact_name">{{__("Contact name")}}</x-input.label>
                    <x-input.text wire:model="state.contact_name" id="contact_name" name="contact_name" class="w-full"/>
                    <x-input.error for="contact_name"></x-input.error>
                </div>
            </div>
            <div class="w-1/2">
                <div class="space-y-3">
                    <x-input.label for="contact_phone">{{__("Contact phone")}}</x-input.label>
                    <x-input.text wire:model="state.contact_phone" id="contact_phone" name="contact_phone" class="w-full"/>
                    <x-input.error for="contact_phone"></x-input.error>
                </div>
            </div>
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
