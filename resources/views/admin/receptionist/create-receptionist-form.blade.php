<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Receptionist Informations") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">
        <div x-data="{existing_user: @entangle('existing_user'),user_id: @entangle('state.user_id'), name: @entangle('state.name'), email: @entangle('state.email'), password: @entangle('state.password')}">
            <div class="py-4 space-y-3">
                <x-input.label for="first_name">{{__("First name")}}</x-input.label>
                <x-input.text wire:model="state.first_name" id="first_name" name="first_name" class="w-full" placeholder="First name"/>
                <x-input.error for="first_name"></x-input.error>
            </div>

            <div class="py-4 space-y-3">
                <x-input.label for="last_name">{{__("last name")}}</x-input.label>
                <x-input.text wire:model="state.last_name" id="last_name" name="last_name" class="w-full" placeholder="Last name"/>
                <x-input.error for="last_name"></x-input.error>
            </div>

            <div class="py-4 space-y-3">
                <x-input.label for="birthdate">{{__("Birthdate")}}</x-input.label>
                <x-input.date wire:model="state.birthdate" id="birthdate" name="birthdate" class="w-full" placeholder="Birthdate"/>
                <x-input.error for="birthdate"></x-input.error>
            </div>

            <div class="py-4 space-y-3">
                <x-input.label for="birth_place">{{__("Birth place")}}</x-input.label>
                <x-input.text wire:model="state.birth_place" id="birth_place" name="birth_place" class="w-full" placeholder="Birth place"/>
                <x-input.error for="birth_place"></x-input.error>
            </div>

            <div class="py-4 space-y-3">
                <label for="existing_user" class="space-x-4">
                    <input type="checkbox" x-model="existing_user" />
                    <template x-if="!existing_user">
                        <span>{{ __("Turn on to select an existing user") }}</span>
                    </template>
                    <template x-if="existing_user">
                        <span>{{ __("Turn off to create a new user") }}</span>
                    </template>
                </label>
            </div>

            <template x-if="existing_user">
                <div class=" py-4 space-y-3">
                    <x-input.label for="user_id">{{__("User")}}</x-input.label>
                    <select
                        x-model="user_id"
                        id="user_id"
                        name="user_id"
                        class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md"
                    >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input.error for="user_id"></x-input.error>
                </div>
            </template>

            <template x-if="!existing_user">
                <div>
                    <div class="py-4 space-y-3">
                        <x-input.label for="name">{{__("Username")}}</x-input.label>
                        <x-input.text x-model="name" id="name" name="name" class="w-full" placeholder="@Username"/>
                        <x-input.error for="name"></x-input.error>
                    </div>

                    <div class="py-4 space-y-3">
                        <x-input.label for="email">{{__("Email")}}</x-input.label>
                        <x-input.text x-model="email" id="email" name="email" class="w-full" placeholder="Email"/>
                        <x-input.error for="email"></x-input.error>
                    </div>

                    <div class="py-4 space-y-3">
                        <x-input.label for="password">{{__("Password")}}</x-input.label>
                        <x-input.password x-model="password" id="password" name="password" class="w-full" placeholder="Password"/>
                        <x-input.error for="password"></x-input.error>
                    </div>
                </div>
            </template>
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
