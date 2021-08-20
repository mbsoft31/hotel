<x-main-layout>
    <x-slot name="header">
        <div class="bg-purple-600 h-96">
            <div class="flex items-end max-w-7xl mx-auto w-full h-full bg-contain bg-no-repeat bg-right bg-opacity-0 md:bg-opacity-100" style="background-image: url('{{ asset('images/doctor-female.png') }}')">
                <div class="block px-6 pt-12 max-w-5xl mx-auto text-center space-y-6">
                    <h1 class="text-5xl text-white font-serif font-bold tracking-wider leading-10">
                        {{ __("Hotel Finder") }}
                    </h1>
                    <div class="text-lg text-white">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, dolorum incidunt. A accusamus aliquid consequuntur debitis, doloribus esse fugiat illum itaque iusto nam natus perspiciatis quasi soluta. Ab inventore maiores quibusdam recusandae similique! Accusamus consequuntur dicta dignissimos eaque et ipsa, laborum minus, neque obcaecati quisquam repellat reprehenderit saepe similique sit.
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div>
        @livewire("room-search")
    </div>

</x-main-layout>
