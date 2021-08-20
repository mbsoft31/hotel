<div>
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
        <div class="relative">
            <div class="relative w-full max-w-7xl mx-auto -mt-20">
                <form action="{{ route("hotel.search") }}">
                    <div class="bg-white max-w-5xl mx-auto px-8 py-16 space-y-4 rounded-md shadow">
                        <div class=" max-w-3xl mx-auto space-y-4">
                            <x-input.label for="search" value="{{ __('Search for Hotel') }}" class="text-xl tracking-wide" />
                            <x-input.text name="search" id="search" placeholder="Search for name, address then just hit enter" wire:model.debounce.300="search" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                        </div>
                    </div>
                </form>
            </div>
            <div id="results" class="relative flex gap-4 w-full max-w-7xl mt-1.5 mx-auto">
                <div class="hidden md:block md:w-1/3 flex-shrink mt-6 space-y-4">
                    <div class="px-6 py-6 space-y-3 bg-gray-50 rounded-md">
                        <div class=" border-b">
                            {{ __("Stars") }}
                        </div>
                        <div class="flex flex-col space-y-3 h-64 overflow-y-auto">
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="0">
                                <span>Any star count</span>
                            </label>
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="1">
                                <span>1 star</span>
                            </label>
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="2">
                                <span>2 stars</span>
                            </label>
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="3">
                                <span>3 stars</span>
                            </label>
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="4">
                                <span>4 stars</span>
                            </label>
                            <label class="space-x-3">
                                <input type="radio" wire:model="stars_filter" value="5">
                                <span>5 stars</span>
                            </label>
                        </div>
                    </div>
                    <div class="px-6 py-6 space-y-3 bg-gray-50 rounded-md">
                        <div class=" border-b">
                            {{ __("Countries") }}
                        </div>
                        <div class="flex flex-col space-y-3 h-64 overflow-y-scroll">
                            @foreach($countries as $k => $country)
                                <label class="space-x-3">
                                    <input type="checkbox" wire:model="country_filter" value="{{$k}}" >
                                    <span>{{ $country }} ( {{$hotels->where('country', $k)->count()}} )</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-6 py-6 space-y-3 bg-gray-50 rounded-md">
                        <div class=" border-b">
                            {{ __("Cities") }}
                        </div>
                        <div class="flex flex-col space-y-3 h-64 overflow-y-scroll">
                            @foreach($cities as $k => $city)
                                <label for="" class="space-x-3">
                                    <input type="checkbox" wire:model="city_filter" value="{{$city}}">
                                    <span>{{ $city }} ( {{$hotels->where('city', $city)->count()}} )</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="relative w-full md:w-2/3">
                    <div wire:loading.class.remove="hidden" class="hidden absolute mt-6 mb-8 inset-0 bg-gray-500 bg-opacity-50"></div>
                    @if( isset($hotels) && ( count($hotels) > 0 ) )
                        <div class="w-full pt-6 pb-8 space-y-3">
                            @foreach($hotels as $hotel)
                                <div class="px-6 py-8 bg-purple-50 border border-gray-300 rounded-md shadow">
                                    <div class="grid grid-cols-12 gap-4 items-center">
                                        <div class="col-span-full h-32 w-full md:col-span-2 md:w-24 md:h-24 m-auto">
                                            <img class="border h-full object-center object-cover md:rounded-full shadow-md w-full" src="{{ isset($hotel->photos) && count($hotel->photos) > 0 ? asset("storage/" . collect($hotel->photos)->first()) : 'https://via.placeholder.com/150'}}" alt="hotel-{{$hotel->id}}">
                                        </div>
                                        <div class="col-span-full md:col-span-10 whitespace-normal">
                                            <div class="flex items-center text-lg font-semibold tracking-wider text-gray-800">
                                                <div class="flex-grow space-y-2">
                                                    <div class="text-yellow-400">
                                                        @for($i = 0; $i < $hotel->stars; $i = $i + 1)
                                                            <span><i class="fas fa-star"></i></span>
                                                        @endfor
                                                    </div>
                                                    <a href="{{ route("hotel.show", $hotel) }}" class="block text-purple-600 hover:text-purple-700">{{ $hotel->name }}</a>
                                                </div>
                                                <a href="{{ route("hotel.show", $hotel) }}" class="px-2 py-1.5 font-semibold tracking-wider whitespace-nowrap text-purple-600 rounded-md border border-transparent hover:text-purple-700 hover:border-purple-700">
                                                    <i class="fas fa-eye"></i>
                                                    <span class="hidden md:inline-block">{{ __("See Hotel") }}</span>
                                                </a>
                                            </div>
                                            <div class="mt-2 block text-xs font-semibold tracking-widest text-gray-600">
                                                {{ $hotel->address }}
                                                <div>
                                                    <span>{{ $all_countries[$hotel->country] ?? $hotel->country }}</span> -
                                                    <span>{{ $hotel->city }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-6 block text-base tracking-wide text-gray-600">
                                                {!! $hotel->description !!}
                                            </div>
                                        </div>
                                        <div class="col-span-10 col-start-3 px-6 py-4 bg-gray-50">
                                            <div>
                                                <span>
                                                    {{ __("Room count: ") }}
                                                </span>
                                                <span>
                                                    {{ $hotel->rooms()->count() }}
                                                </span>
                                            </div>

                                            {{--<div>
                                                <span>
                                                    {{ __("Rooms available: ") }}
                                                </span>
                                                <div class="flex flex-wrap gap-4">
                                                    @foreach($hotel->rooms as $room)
                                                        <div>
                                                            <div>{{ $room->name }} x {{ $room->rooms_count }}</div>
                                                            <div>
                                                                @foreach($room->bedTypes as $bed)
                                                                    <div>
                                                                        <span>{{ $bed->name }}</span> - <span>{{ $bed->capacity }}</span> <span><i class="fas fa-users"></i></span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="px-6 pt-6">
                                {{ $hotels->links() }}
                            </div>--}}
                        </div>
                    @else
                        <div class="bg-white w-full px-4 pt-6 pb-8 rounded-md shadow">
                            <div>
                                {{ __("No result was found !") }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
