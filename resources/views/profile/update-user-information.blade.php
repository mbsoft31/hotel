<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Account information") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="py-4 space-y-3">
            <x-input.label for="name">{{__("Username")}}</x-input.label>
            <x-input.text wire:model="state.name" id="name" name="name" class="w-full" placeholder="Name"/>
            <x-input.error for="name"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="email">{{__("Email")}}</x-input.label>
            <x-input.text wire:model="state.email" id="email" name="email" class="w-full" placeholder="Email"/>
            <x-input.error for="email"></x-input.error>
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
