<x-guest-layout>


    <div class="bg-pink-600 h-72">
        <div class="flex items-end w-full h-full bg-contain bg-no-repeat bg-right bg-opacity-0 md:bg-opacity-100" style="background-image: url('{{ asset('images/1/2/2.jpg') }}')">
            <div class="block px-10 py-10 space-y-6">
                <h1 class="text-5xl text-white font-serif font-bold tracking-wider leading-10">
                    {{ $hotel->name }}
                </h1>
                <div class="text-lg text-white">
                    {!! $hotel->description !!}
                </div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="relative bg-gray-100 py-12">
        <div id="results" class="relative w-full max-w-3xl mx-auto">
            <div class="uppercase text-sm font-semibold tracking-wider text-gray-800">
                Rooms
            </div>
            <div class="mt-4 bg-white w-full px-4 pt-6 pb-8 rounded-md shadow">
                @foreach($hotel->rooms as $room)
                    <div class="px-4 py-4 border border-gray-300">
                        <div class="flex items-center space-x-6">
                            <div>
                                <img class="w-16 h-16 rounded-full object-center object-cover" src="{{$room->photo_url}}" alt="hotel-{{$room->id}}">
                            </div>
                            <div class="flex-grow align-center">
                                <div class="flex items-center text-lg font-semibold tracking-wider text-gray-800">
                                    <a href="{{ route("hotel.show", $room) }}" class="flex-grow text-pink-600 hover:text-pink-700">Room: {{ $room->floor_number }}-{{ $room->number }}</a>
                                    <a href="#" class="px-2 py-1.5 font-semibold tracking-wider text-pink-600 rounded-md border border-transparent hover:text-pink-700 hover:border-pink-700">
                                        {{ __("Make a booking") }}
                                    </a>
                                </div>
                                <div class="space-x-4">
                                    <div class="inline-block text-sm tracking-widest text-gray-600">
                                        Beds: {{ $room->bed_count }}
                                    </div>
                                    <div class="inline-block text-sm tracking-widest text-gray-600">
                                        Floor: {{ $room->floor_number }}
                                    </div>
                                    <div class="inline-block text-sm tracking-widest text-gray-600">
                                        Number: {{ $room->number }}
                                    </div>
                                </div>
                                <div class="block text-sm tracking-widest text-gray-600">
                                    {{ $room->address }}
                                </div>
                                <div class="mt-4 block text-sm tracking-widest text-gray-600">
                                    {!! $room->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-guest-layout>
