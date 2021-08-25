<x-main-layout>
    <div class="mt-10">
        <x-auth-card>
            <x-slot name="logo">
                {{--            <a href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a>--}}
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
            @csrf

                <!-- First name -->
                <div>
                    <x-label for="first_name" :value="__('First name')" />

                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required />
                </div>

                <!-- Last name -->
                <div class="mt-4">
                    <x-label for="last_name" :value="__('Last name')" />

                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                </div>

                <!-- Birthdate -->
                <div class="mt-4">
                    <x-label for="birthdate" :value="__('Birthdate')" />

                    <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" :max="\Carbon\Carbon::today()->subYears(18)->format('Y-m-d')" required />
                </div>

                <!-- Birth place -->
                <div class="mt-4">
                    <x-label for="birth_place" :value="__('Birth place')" />

                    <x-input id="birth_place" class="block mt-1 w-full" type="text" name="birth_place" :value="old('birth_place')" required />
                </div>

                <!-- Gender -->
                <div class="mt-4">
                    <x-label for="gender" :value="__('Gender')" />

                    <select id="gender" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="gender" :value="old('gender')" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- CID type -->
                <div class="mt-4">
                    <x-label for="CID_type" :value="__('CID type')" />

                    <select id="CID_type" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="CID_type" :value="old('CID_type')" required>
                        <option value="national_id">national_id</option>
                        <option value="passport">passport</option>
                    </select>
                </div>

                <!-- CID -->
                <div class="mt-4">
                    <x-label for="CID" :value="__('CID number')" />

                    <x-input id="CID" class="block mt-1 w-full" type="text" name="CID" :value="old('CID')" required />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-label for="name" :value="__('Username')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>

                {{--<!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                </div>--}}

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-main-layout>
