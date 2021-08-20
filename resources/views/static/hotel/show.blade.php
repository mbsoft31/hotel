<x-main-layout>

    <x-slot name="header">
        <div x-data="{photos: {{json_encode($hotel->photos??[])}}, selected:0}" class="w-full h-96">
            <div class="relative w-full h-full bg-cover bg-no-repeat bg-right bg-opacity-0 md:bg-opacity-100" :style="`background-image: url('${photos[selected]?'/storage/'+ photos[selected]:''}')`">
                <div class="absolute inset-0 z-10 bg-purple-800 bg-opacity-50"></div>
                <div class="absolute inset-0 z-20 max-w-7xl mx-auto ">
                    <div class="block px-6 pt-12 max-w-5xl mx-auto text-center space-y-6">
                        <h1 class="text-2xl md:text-5xl text-white font-serif font-bold tracking-wider leading-10">
                            {{ $hotel->name }}
                        </h1>
                        <div class="text-yellow-400">
                            @for($i = 0; $i < $hotel->stars; $i = $i + 1)
                                <span><i class="fas fa-star fa-2x"></i></span>
                            @endfor
                        </div>
                        <div class="text-lg text-white">
                            {{ $hotel->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @livewire("hotel.hotel-rooms", ["hotel" => $hotel])

</x-main-layout>
