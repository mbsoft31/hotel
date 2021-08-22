<div>
    <div x-data="{show: @entangle('show')}" class="-mt-12 relative z-40 px-6 py-12 bg-white border rounded-md shadow-md">

        <div class="max-w-3xl mx-auto mt-8 space-y-6">
            <ul class="flex items-center justify-around space-x-3">
                <li class="w-full">
                    <button x-on:click="show = 'reservation_informations'" :class="{ 'text-purple-500 bg-purple-50': show == 'reservation_informations' }" class="block w-full px-6 py-3 rounded-md text-lg text-center font-semibold tracking-wide hover:text-purple-500 hover:bg-purple-50">
                        {{ __("Reservation Informations") }}
                    </button>
                </li>
                <li class="w-full">
                    <button x-on:click="show = 'guest_informations'" :class="{ 'text-purple-500 bg-purple-50': show == 'guest_informations' }" class="block w-full px-6 py-3 rounded-md text-lg text-center font-semibold tracking-wide hover:text-purple-500 hover:bg-purple-50">
                        {{ __("Guest Informations") }}
                    </button>
                </li>
                <li class="w-full">
                    <button x-on:click="show = 'rooms_informations'" :class="{ 'text-purple-500 bg-purple-50': show == 'rooms_informations' }" class="block w-full px-6 py-3 rounded-md text-lg text-center font-semibold tracking-wide hover:text-purple-500 hover:bg-purple-50">
                        {{ __("Rooms Informations") }}
                    </button>
                </li>
            </ul>
        </div>
        <div class="max-w-3xl mx-auto space-y-6 bg-gray-50">

            <div x-show="show == 'reservation_informations'" class="flex flex-col px-8 py-6 space-y-6" style="display: none">
                <div class="w-full space-y-3">
                    <x-input.label for="start">Start date</x-input.label>
                    <input wire:model="start" id="start" name="start" type="date" min="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" class="rounded-md w-2/3">
                </div>

                <div class="w-full space-y-3">
                    <x-input.label for="start">Start date</x-input.label>
                    <input wire:model="start" id="start" name="start" type="date" min="{{ \Carbon\Carbon::now()->format("Y-m-d") }}" class="rounded-md w-2/3">
                </div>

                <div class="w-full space-y-3">
                    <x-input.label for="nights">Night count</x-input.label>
                    <input wire:model="nights" id="nights" name="nights" type="number" min="1" class="rounded-md w-2/3">
                </div>

                <div class="w-full space-y-3">
                    <x-input.label for="persons_count">How many person per room?</x-input.label>
                    <input wire:model="persons" id="persons_count" name="persons_count" type="number" min="1" class="rounded-md w-2/3">
                </div>
            </div>

            <div x-show="show == 'guest_informations'" class="" style="display: none">
                @auth
                    @if(Auth::user()->hasRole("guest"))
                        <div class="flex flex-col px-8 py-6 space-y-6">
                            <div class="w-full space-y-3">
                                <div>
                                    {{ __("National ID") }}:
                                </div>
                                <div class="uppercase text-lg font-bold tracking-wide">
                                    {{ Auth::user()->guest->CID }} <span class="uppercase">({{ Auth::user()->guest->CID_type }})</span>
                                </div>
                            </div>
                            <div class="w-full space-y-3">
                                <div>
                                    {{ __("Full name") }}:
                                </div>
                                <div class="uppercase text-lg font-bold tracking-wide">
                                    {{ Auth::user()->guest->name }}
                                </div>
                            </div>

                            <div class="w-full space-y-3">
                                <div>
                                    {{ __("Gender") }}:
                                </div>
                                <div class="uppercase text-lg font-bold tracking-wide">
                                    {{ Auth::user()->guest->gender }}
                                </div>
                            </div>
                            <div class="w-full space-y-3">
                                <div>
                                    {{ __("Birthdate") }}:
                                </div>
                                <div class="uppercase text-lg font-bold tracking-wide">
                                    {{ Auth::user()->guest->birthdate }}
                                </div>
                            </div>

                            <div class="w-full space-y-3">
                                <div>
                                    {{ __("Birth place") }}:
                                </div>
                                <div class="uppercase text-lg font-bold tracking-wide">
                                    {{ Auth::user()->guest->birth_place }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col px-8 py-6 space-y-6">

                            <input wire:click="state.user_id" id="user_id" name="user_id" type="hidden" value="{{Auth::id()}}">

                            <div class="w-full space-y-3">
                                <x-input.label for="CID_type">{{ __("ID type") }}</x-input.label>
                                <select wire:model="state.CID_type" id="CID_type" name="CID_type" class="rounded-md w-2/3">
                                    <option value="national_id">{{ __("National ID card") }}</option>
                                    <option value="passport">{{ __("passport") }}</option>
                                </select>
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="CID">{{ __("National ID number") }}</x-input.label>
                                <input wire:model="state.CID" id="CID" name="CID" type="text" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="first_name">{{ __("First name") }}</x-input.label>
                                <input wire:model="state.first_name" id="first_name" name="first_name" type="text" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="last_name">{{ __("Last name") }}</x-input.label>
                                <input wire:model="state.last_name" id="last_name" name="last_name" type="text" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="gender">{{ __("Gender") }}</x-input.label>
                                <input wire:model="state.gender" id="gender" name="gender" type="text" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="birthdate">{{ __("Birthdate") }}</x-input.label>
                                <input wire:model="state.birthdate" id="birthdate" name="birthdate" type="date" max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full space-y-3">
                                <x-input.label for="birth_place">{{ __("Birth place") }}</x-input.label>
                                <input wire:model="state.birth_place" id="birth_place" name="birth_place" type="text" class="rounded-md w-2/3">
                            </div>

                            <div class="w-full flex items-center justify-end space-x-3">
                                <a href="{{ route("register") }}">
                                    {{ __("Login using an other account") }}
                                </a>
                                <button wire:click="createGuest()" type="button" class="px-6 py-2 rounded-md shadow text-gray-50 bg-indigo-500 hover:text-white hover:bg-indigo-700">
                                    {{ __("Save") }}
                                </button>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="flex flex-col px-8 py-6 space-y-6">
                        <div class="w-full space-y-3">
                            <x-input.label for="email">{{ __("Email") }}</x-input.label>
                            <input wire:model="state.email" id="email" name="email" type="email" class="rounded-md w-2/3">
                            <x-input.error for="email"></x-input.error>
                        </div>

                        <div class="w-full space-y-3">
                            <x-input.label for="password">{{ __("Password") }}</x-input.label>
                            <input wire:model="state.password" id="password" name="password" type="password" class="rounded-md w-2/3">
                            <x-input.error for="password"></x-input.error>
                        </div>

                        <div class="w-full flex items-center justify-end space-x-3">
                            <a href="{{ route("register") }}">
                                {{ __("Create an account") }}
                            </a>
                            <button wire:click="login()" type="button" class="px-6 py-2 rounded-md shadow text-gray-50 bg-indigo-500 hover:text-white hover:bg-indigo-700">
                                {{ __("Log in") }}
                            </button>
                        </div>
                    </div>
                @endauth
            </div>

            <div x-show="show == 'rooms_informations'" class="flex flex-col px-4 py-6 space-y-6" style="display: none">
                @if(isset($selected_rooms_models))
                    <div class="max-w-3xl mx-auto space-y-6">
                        <div class="space-y-2">
                            @foreach($selected_rooms_models as $room)
                                <div class="px-6 py-2 bg-gray-50 border-b border-gray-300">
                                    <div class="grid grid-cols-12 gap-4 items-center">
                                        {{--<div class="col-span-full h-32 w-full md:col-span-2 md:w-24 md:h-24 m-auto">
                                            <img class="border h-full object-center object-cover md:rounded-full shadow-md w-full" src="{{ isset($room->hotel->photos) && count($room->hotel->photos) > 0 ? asset("storage/" . collect($room->hotel->photos)->first()) : 'https://via.placeholder.com/150'}}" alt="hotel-{{$room->hotel->id}}">
                                        </div>--}}
                                        <div class="col-span-full md:col-span-12 whitespace-normal">
                                            <div class="flex items-end py-4 text-lg font-semibold tracking-wider text-gray-800">
                                                <div class="flex-grow space-y-2">
                                                    <div>
                                                        <span class="text-sm text-gray-500">{{ $room->roomType->name }}</span>
                                                    </div>
                                                    <a href="#" class="block text-purple-600 hover:text-purple-700">
                                                        {{ $room->name }}
                                                    </a>
                                                </div>
                                                <div class="space-y-2">
                                                    <div class="flex justify-end">
                                                        <button wire:click="removeRoom({{ $room }})" class="text-pink-500 hover:text-pink-700">
                                                            <i class="fas fa-trash"></i>
                                                            <span>{{ __("Remove") }}</span>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <span class="text-sm text-gray-500"> {{ __("Price") }} :</span>
                                                        <span class="text-purple-600 text-sm font-semibold tracking-widest">{{ $room->room_price_x_person }} {{ $room->room_price_currency }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 py-4 block text-xs font-semibold tracking-widest text-gray-600">
                                                <div>
                                                    <div class="mb-2 underline">
                                                        {{ __("Room's beds") }}:
                                                    </div>
                                                    <div class="space-y-2">
                                                        @foreach($room->bedTypes as $bed)
                                                            <div>
                                                                <span>{{ $bed->name }} -</span> <span>{{ $bed->capacity }} x </span> <i class="fas fa-users"></i>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div>
                                    <div>{{ $room["id"] }}</div>
                                    <div>
                                        <a href="" class="pb-8 block text-purple-600 hover:text-purple-700">
                                            {{ $room["name"] }}
                                        </a>
                                    </div>
                                    <div>
                                        <button wire:click="removeRoom({{ $room }})">{{ __("remove") }}</button>
                                    </div>
                                </div>--}}
                            @endforeach

                            <div class="px-6 py-6 flex items-center justify-end">
                                <div>
                                    <span>{{ __("Total price") }}: </span>
                                    <span class="text-3xl text-gray-800">{{ $selected_rooms_models->sum("room_price_x_person") }} {{ $selected_rooms_models->first()->room_price_currency??'' }}</span>
                                </div>
                            </div>

                            <div class="px-6 py-6 flex items-center justify-end">
                                <div>
                                    <x-button wire:click="makeReservation()" type="button" class="py-4 bg-purple-600 hover:bg-purple-700">{{ __("Make reservation") }}</x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </div>

    <div class="mt-8 max-w-5xl mx-auto space-y-4">
        @foreach($rooms as $room)
            <div class="px-8 py-2 bg-gray-50 border border-gray-300 rounded-md shadow">
                <div class="grid grid-cols-12 gap-4 items-center">
                    {{--<div class="col-span-full h-32 w-full md:col-span-2 md:w-24 md:h-24 m-auto">
                        <img class="border h-full object-center object-cover md:rounded-full shadow-md w-full" src="{{ isset($room->hotel->photos) && count($room->hotel->photos) > 0 ? asset("storage/" . collect($room->hotel->photos)->first()) : 'https://via.placeholder.com/150'}}" alt="hotel-{{$room->hotel->id}}">
                    </div>--}}
                    <div class="col-span-full md:col-span-12 whitespace-normal">
                        <div class="flex items-end py-4 text-lg font-semibold tracking-wider text-gray-800">
                            <div class="flex-grow space-y-2">
                                <div>
                                    <span class="text-sm text-gray-500">{{ $room->roomType->name }}</span>
                                </div>
                                <a href="#" class="block text-purple-600 hover:text-purple-700">
                                    {{ $room->id }} {{ $room->name }}
                                </a>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-end">
                                    <button wire:click="selectRoom({{ $room }})" class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-plus-circle"></i>
                                        <span>{{ __("Select") }}</span>
                                    </button>
                                </div>
                                <div>
                                    <span class="text-gray-500"> {{ __("Price") }} :</span>
                                    <span class="text-purple-600 font-semibold tracking-widest">{{ $room->room_price_x_person }} {{ $room->room_price_currency }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 py-4 space-y-4 block text-xs font-semibold tracking-widest text-gray-600">

                            <div>
                                <div class="mb-2 underline">
                                    {{ __("Room's beds") }}:
                                </div>
                                <div class="space-y-2">
                                    @foreach($room->bedTypes as $bed)
                                        <div>
                                            <span>{{ $bed->name }} -</span> <span>{{ $bed->capacity }} x </span> <i class="fas fa-users"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if($room->size)
                                <div>
                                    <div class="mb-2 underline">
                                        {{ __("Room size") }}:
                                    </div>
                                    <div class="space-y-2">
                                        <div>
                                            <span>{{ $bed->room_size }}</span> <span>{{ $bed->room_size_measure_unit }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div>
                                <div class="mb-2 underline">
                                    {{ __("smoking") }}:
                                </div>
                                <div class="space-y-2">
                                    <div>
                                        @if( ! $bed->no_smoking )
                                        <i class="fas fa-smoking-ban fa-2x"></i>
                                        @endif
                                        @if( $bed->no_smoking )
                                        <i class="fas fa-smoking fa-2x"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
