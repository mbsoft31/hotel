<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Account password") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">
        <div class="py-4 space-y-3">
            <x-input.label for="old_password">{{__("Old password")}}</x-input.label>
            <x-input.password wire:model="state.old_password" id="old_password" name="old_password" class="w-full" placeholder="your old password"/>
            <x-input.error for="old_password"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="password">{{__("New password")}}</x-input.label>
            <x-input.password wire:model="state.password" id="password" name="password" class="w-full" placeholder="your new password"/>
            <x-input.error for="password"></x-input.error>
        </div>

        <div class="py-4 space-y-3">
            <x-input.label for="password_confirmation">{{__("Confirm your password")}}</x-input.label>
            <x-input.password wire:model="state.password_confirmation" id="password_confirmation" name="password_confirmation" class="w-full" placeholder="confirm your password"/>
            <x-input.error for="password_confirmation"></x-input.error>
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
