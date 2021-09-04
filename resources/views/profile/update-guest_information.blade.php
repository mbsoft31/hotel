<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Personal information") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="py-4 space-y-3">
            <x-input.label for="first_name">{{__("First name")}}</x-input.label>
            <x-input.text wire:model="state.first_name" id="first_name" name="first_name" class="w-full" placeholder="Name"/>
            <x-input.error for="first_name"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="last_name">{{__("Last name")}}</x-input.label>
            <x-input.text wire:model="state.last_name" id="last_name" name="last_name" class="w-full" placeholder="Name"/>
            <x-input.error for="last_name"/>
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input.label for="birthdate">{{ __('Birthdate') }}</x-input.label>
            <x-input.text wire:model="state.birthdate" id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :max="\Carbon\Carbon::today()->subYears(18)->format('Y-m-d')" required />
            <x-input.error for="birthdate"/>
        </div>

        <!-- Birth place -->
        <div class="py-4 space-y-3">
            <x-input.label for="birth_place">{{__("Birth place")}}</x-input.label>
            <x-input.text wire:model="state.birth_place" id="birth_place" name="birth_place" class="w-full" placeholder="Name"/>
            <x-input.error for="birth_place"/>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="gender">{{__("Gender")}}</x-input.label>
            <select wire:model="state.gender" id="gender" name="gender" class="w-full">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <x-input.error for="gender"></x-input.error>
        </div>

        <!-- CID type -->
        <div class="py-4 space-y-3">
            <x-input.label for="CID_type">{{__("CID type")}}</x-input.label>
            <select wire:model="state.CID_type" id="CID_type" name="CID_type" class="w-full">
                <option value="national_id">national_id</option>
                <option value="passport">passport</option>
            </select>
            <x-input.error for="CID_type"></x-input.error>
        </div>

        <!-- CID -->
        <div class="py-4 space-y-3">
            <x-input.label for="CID">{{__("CID number")}}</x-input.label>
            <x-input.text wire:model="state.CID" id="CID" name="CID" class="w-full" placeholder="Name"/>
            <x-input.error for="CID"/>
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
