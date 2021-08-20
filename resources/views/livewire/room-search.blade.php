<div class="relative">
    <div class="relative w-full max-w-7xl mx-auto -mt-20">
        <form>
            <div class="bg-white max-w-5xl mx-auto px-8 py-16 space-y-4 rounded-md shadow">
                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="w-full space-y-4">
                        <x-input.label for="search" value="{{ __('Search for Hotel') }}" class="text-xl tracking-wide" />
                        <x-input.text wire:model.debounce.300="search" name="search" id="search" placeholder="Search for name, address then just hit enter" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-1/2 space-y-4">
                            <x-input.label for="start" value="{{ __('Arrival date') }}" class="text-xl tracking-wide" />
                            <x-input.date wire:model="start" name="start" id="start" placeholder="Search for name, address then just hit enter" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                        </div>
                        <div class="w-1/2 space-y-4">
                            <x-input.label for="end" value="{{ __('Departure date') }}" class="text-xl tracking-wide" />
                            <x-input.date wire:model="end" name="end" id="end" placeholder="Search for name, address then just hit enter" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-1/2 space-y-4">
                            <x-input.label for="nights" value="{{ __('Nights') }}" class="text-xl tracking-wide" />
                            <x-input.number wire:model="nights" name="nights" id="nights" placeholder="Number of nights" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                        </div>
                        <div class="w-1/2 space-y-4">
                            <x-input.label for="persons" value="{{ __('persons') }}" class="text-xl tracking-wide" />
                            <x-input.number wire:model="persons" name="persons" id="persons" placeholder="how many persons" class="w-full text-xl border border-gray-300 focus:border-purple-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-purple-500"/>
                        </div>
                    </div>
                </div>

                {{--<div class="flex items-center space-x-4">
                    <div class="w-full">
                        <button type="button" wire:click="search()" class="block w-full px-6 py-3 border rounded-md shadow-sm bg-gray-600 text-gray-50 hover:bg-gray-800 hover:text-white">
                            {{ __("Search") }}
                        </button>
                    </div>
                </div>--}}
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
                        <input type="radio" wire:model="stars" value="0">
                        <span>Any star count</span>
                    </label>
                    <label class="space-x-3">
                        <input type="radio" wire:model="stars" value="1">
                        <span>1 star</span>
                    </label>
                    <label class="space-x-3">
                        <input type="radio" wire:model="stars" value="2">
                        <span>2 stars</span>
                    </label>
                    <label class="space-x-3">
                        <input type="radio" wire:model="stars" value="3">
                        <span>3 stars</span>
                    </label>
                    <label class="space-x-3">
                        <input type="radio" wire:model="stars" value="4">
                        <span>4 stars</span>
                    </label>
                    <label class="space-x-3">
                        <input type="radio" wire:model="stars" value="5">
                        <span>5 stars</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="relative w-full md:w-2/3">
            <div wire:loading.class.remove="hidden" class="hidden absolute mt-6 mb-8 inset-0 bg-gray-500 bg-opacity-50"></div>
            @if( isset($rooms) && ( count($rooms) > 0 ) )
                <div class="w-full pt-6 pb-8 space-y-3">
                    <div class="px-6 pt-6">
                        {{ $rooms->links() }}
                    </div>
                    @foreach($rooms as $room)
                        @if($room->capacity < $persons)
                            @continue
                        @endif
                        <div class="px-6 py-8 bg-purple-50 border border-gray-300 rounded-md shadow">
                            <div class="grid grid-cols-12 gap-4 items-center">
                                <div class="col-span-full h-32 w-full md:col-span-2 md:w-24 md:h-24 m-auto">
                                    <img class="border h-full object-center object-cover md:rounded-full shadow-md w-full" src="{{ isset($room->hotel->photos) && count($room->hotel->photos) > 0 ? asset("storage/" . collect($room->hotel->photos)->first()) : 'https://via.placeholder.com/150'}}" alt="hotel-{{$room->hotel->id}}">
                                </div>
                                <div class="col-span-full md:col-span-10 whitespace-normal">
                                    <div class="flex items-center text-lg font-semibold tracking-wider text-gray-800">
                                        <div class="flex-grow space-y-2">
                                            <div class="text-yellow-400">
                                                @for($i = 0; $i < $room->hotel->stars; $i = $i + 1)
                                                    <span><i class="fas fa-star"></i></span>
                                                @endfor
                                            </div>
                                            <a href="{{ route("hotel.show", ["hotel"=>$room->hotel, "start"=>$start, "end"=>$end, "nights"=>$nights, "persons"=>$persons, "room" => $room->id]) }}" class="pb-8 block text-purple-600 hover:text-purple-700">{{ $room->hotel->name }}</a>
                                        </div>
                                        <div class="space-y-2">
                                            <div>
                                                <a href="{{ route("hotel.show", ["hotel"=>$room->hotel, "start"=>$start, "end"=>$end, "nights"=>$nights, "persons"=>$persons, "room" => $room->id]) }}" class="inline-block px-2 py-2 font-semibold tracking-wider whitespace-nowrap text-purple-600 rounded-md border border-transparent hover:text-purple-700 hover:border-purple-700">
                                                    <i class="fas fa-eye"></i>
                                                    <span class="hidden md:inline-block">{{ __("See Hotel") }}</span>
                                                </a>
                                            </div>
                                            <div>
                                               <span class="text-gray-500"> {{ __("Price") }} :</span>
                                                <span class="text-purple-600 font-semibold tracking-widest">{{ $room->room_price_x_person }} {{ $room->room_price_currency }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 block text-xs font-semibold tracking-widest text-gray-600">
                                        {{ $room->hotel->address }}
                                        <div>
                                            <span>{{ $all_countries[$room->hotel->country] ?? $room->hotel->country }}</span> -
                                            <span>{{ $room->hotel->city }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-6 block text-base tracking-wide text-gray-600">
                                        {!! $room->hotel->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-6 mb-8">
                    <div class="bg-white w-full px-4 pt-6 pb-8 rounded-md shadow">
                        <div>
                            {{ __("No result was found !") }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
