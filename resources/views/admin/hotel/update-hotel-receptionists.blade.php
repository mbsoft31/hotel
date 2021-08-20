<x-form-section submit="updateHotelInformation">
    <x-slot name="title">
        {{ __("Hotel Receptionists") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="space-y-4">

            <ul class="py-2 border rounded-md">
                @forelse($receptionists as $receptionist)
                    <li class="px-4 py-2 flex items-center justify-between">
                        <div>
                            <div>{{ $receptionist->name }}</div>
                            <div class="text-gray-500">{{ $receptionist->user->email }}</div>
                        </div>
                        <div>
                            <button wire:click="removeReceptionist({{ $receptionist }})" type="button" class="text-red-400 hover:text-red-600"><i class="fas fa-trash"></i></button>
                        </div>
                    </li>
                @empty
                    <li class="px-4 py-4 flex items-center space-x-4">

                        <div class="flex items-center justify-center w-12 h-12 text-gray-500 rounded-full border border-1">
                            <i class="fas fa-info fa-lg"></i>
                        </div>

                        <div>
                            {{ __("No receptionist available, please add some rooms") }}
                        </div>
                    </li>
                @endforelse
            </ul>

            <div>
                @livewire("admin.create-hotel-receptionist-form", ["hotel" => $hotel])
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
