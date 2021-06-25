<div>

    <div class="bg-pink-600 h-88">
        <div class="flex items-end w-full h-full bg-contain bg-no-repeat bg-right bg-opacity-0 md:bg-opacity-100" style="background-image: url('{{ asset('images/doctor-female.png') }}')">
            <div class="block px-10 py-10 max-w-lg space-y-6">
                <h1 class="text-5xl text-white font-serif font-bold tracking-wider leading-10">
                    {{ __("Hotel Finder") }}
                </h1>
                <div class="text-lg text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ipsa maiores nostrum pariatur sit tempore.
                </div>
                <div></div>
            </div>
        </div>
    </div>

    <div>
        <div class="relative">
            <div class="relative w-full max-w-3xl mx-auto -mt-10">
                <form action="{{ route("hotel.search") }}">
                    <div class="bg-white w-full px-8 pt-6 pb-8 space-y-4 rounded-md shadow">
                        <x-jet-label for="search" value="{{ __('Search for Hotel') }}" class="text-xl tracking-wide" />
                        <x-input.text name="search" id="search" placeholder="Search for name, address then just hit enter" wire:model.debounce.300="search" class="w-full text-xl border border-gray-300 focus:border-pink-300 outline-none focus:ring-offset-1 focus:ring-2 focus:ring-pink-500"/>
                    </div>
                </form>
            </div>
            <div id="results" class="relative w-full max-w-3xl mt-1.5 mx-auto">
                @if( isset($hotels) && ( count($hotels) > 0 ) && ( $search != '' ) )
                    <div class="bg-white w-full px-4 pt-6 pb-8 rounded-md shadow">
                        @foreach($hotels as $hotel)
                            <div class="px-4 py-4 border border-gray-300">
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <img class="w-16 h-16 rounded-full object-center object-cover" src="{{$hotel->photo_url}}" alt="hotel-{{$hotel->id}}">
                                    </div>
                                    <div class="flex-grow align-center">
                                        <div class="flex items-center text-lg font-semibold tracking-wider text-gray-800">
                                            <a href="{{ route("hotel.show", $hotel) }}" class="flex-grow text-pink-600 hover:text-pink-700">{{ $hotel->name }}</a>
                                            <a href="{{ route("hotel.show", $hotel) }}" class="px-2 py-1.5 font-semibold tracking-wider text-pink-600 rounded-md border border-transparent hover:text-pink-700 hover:border-pink-700">
                                                {{ __("See Hotel") }}
                                            </a>
                                        </div>
                                        <div class="block text-sm tracking-widest text-gray-600">
                                            {{ $hotel->address }}
                                        </div>
                                        <div class="mt-4 block text-sm tracking-widest text-gray-600">
                                            {!! $hotel->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="px-6 pt-6">
                            {{ $hotels->links() }}
                        </div>
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
