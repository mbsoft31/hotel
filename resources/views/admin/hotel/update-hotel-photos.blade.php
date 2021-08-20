<x-form-section submit="save">
    <x-slot name="title">
        {{ __("Hotel Photos") }}
    </x-slot>

    <x-slot name="description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur distinctio laboriosam laudantium molestiae nobis non obcaecati qui quisquam veritatis! Cum ea, enim eveniet porro quibusdam reiciendis rem totam. Fugiat!
    </x-slot>

    <x-slot name="form">

        <div class="">
            <div class="flex flex-wrap items-center gap-4">
                @foreach($images as $photo)
                    <div class="relative h-32 w-32 bg-center bg-cover" style="background-image: url({{ asset("storage/$photo") }});">
                        <div class="absolute inset-0 bg-red-400 bg-opacity-25">
                            <button wire:click="delete('{{$photo}}')" type="button" class="absolute top-0 right-0 w-8 h-8 text-red-400" >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8">

                <input type="file" wire:model="photos" multiple>

                <div wire:loading wire:target="photos">Uploading...</div>

                @error('photos') <span class="error">{{ $message }}</span> @enderror

        </div>

        @push("scripts")
            {{--<script>
                let files = document.querySelector('input[type="file"]')

                // Upload multiple files:
                @this.uploadMultiple('photos', files, (uploadedFilename) => {
                    // Success callback.
                }, () => {
                    // Error callback.
                }, (event) => {
                    // Progress callback.
                    // event.detail.progress contains a number between 1 and 100 as the upload progresses.
                })

                // Remove single file from multiple uploaded files
                @this.removeUpload('photos', uploadedFilename, successCallback)
            </script>--}}
        @endpush


    </x-slot>

    <x-slot name="actions">
        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>
        <button wire:loading.attr="disabled" wire:loading.class="bg-gray-100 text-gray-300" wire:target="photos" type="submit" class="px-6 py-2 rounded-md shadow bg-gray-600 text-gray-100 hover:text-white hover:bg-gray-800">
            {{ __("Save") }}
        </button>
    </x-slot>
</x-form-section>
