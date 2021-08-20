<x-main-layout>

    <div class="space-y-12">
        <div class="mt-6">
            @livewire("admin.update-hotel-information-form", ["hotel" => $hotel])
        </div>

        <div class="mt-6">
            @livewire("admin.update-hotel-receptionists", ["hotel" => $hotel])
        </div>

        <div class="mt-6">
            @livewire("admin.update-hotel-rooms", ["hotel" => $hotel])
        </div>

        <div class="mt-6">
            @livewire("admin.update-hotel-photos", ["hotel" => $hotel])
        </div>
    </div>

</x-main-layout>
