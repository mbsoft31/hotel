@props(["countries" => ["DZ"]])
<form action="{{ route("admin.hotel.store") }}" method="POST" {{ $attributes }}>
        @csrf
        <div class="py-4  space-y-3">
            <x-input.label for="name">{{__("Name")}}</x-input.label>
            <x-input.text class="w-full" id="name" name="name" placeholder="Hotel name"/>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="stars">{{__("Stars")}}</x-input.label>
            <select class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md" id="stars" name="stars">
                <option value="1">{{ "1 star" }}</option>
                <option value="2">{{ "2 star" }}</option>
                <option value="3">{{ "3 star" }}</option>
                <option value="4">{{ "4 star" }}</option>
                <option value="5">{{ "5 star" }}</option>
            </select>
        </div>

        <div class="py-4  space-y-3">
            <x-input.label for="description">{{ __("Description") }}</x-input.label>
            <x-input.area class="w-full" id="description" name="description"></x-input.area>
        </div>

        <hr class="my-3" />

        <div class="py-4 space-y-3">
            <x-input.label for="address">{{ __("Address") }}</x-input.label>
            <x-input.text class="w-full" id="address" name="address" />
        </div>

        <div class="flex flex-nowrap items-center gap-4 mb-3 py-4">
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="country">{{__("Country")}}</x-input.label>
                    <select class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md w-full" id="country" name="country">
                        @foreach($countries as $code => $name)
                            <option value="{{$code}}" @if($code ==="DZ") selected @endif>{{ $code . " - " .$name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="city">{{__("City")}}</x-input.label>
                    <x-input.text class="w-full" id="city" name="city" />
                </div>
            </div>
            <div class="w-1/3">
                <div class="space-y-3">
                    <x-input.label for="zipcode">{{__("Zipcode")}}</x-input.label>
                    <x-input.text class="w-full" id="zipcode" name="zipcode" />
                </div>
            </div>
        </div>

        <hr class="my-3" />

        <div class="flex flex-nowrap items-center gap-4 py-4">
            <div class="w-1/2">
                <div class="space-y-3">
                    <x-input.label for="contact_name">{{__("Contact name")}}</x-input.label>
                    <x-input.text class="w-full" id="contact_name" name="contact_name"/>
                </div>
            </div>
            <div class="w-1/2">
                <div class="space-y-3">
                    <x-input.label for="contact_phone">{{__("Contact phone")}}</x-input.label>
                    <x-input.text class="w-full" id="contact_phone" name="contact_phone"/>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-8 pt-6 pb-2 border-t">
            <!-- Button trigger modal -->
            <button type="submit" class="px-6 py-2 rounded-md shadow bg-gray-600 text-gray-100 hover:text-white hover:bg-gray-800">
                {{ __("Save") }}
            </button>
        </div>
</form>
