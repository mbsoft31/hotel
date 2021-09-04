<x-main-layout>
    <x-slot name="title">
        {{ __("Profile") }}
    </x-slot>

    <div class="mt-8">
        @livewire("profile.update-user-information", ["user" => $user])
    </div>

    <div class="mt-8">
        @livewire("profile.update-user-password", ["user" => $user])
    </div>

    @if($user->hasRole("guest"))
        <div class="mt-8">
            @livewire("profile.update-guest-information", ["user" => $user])
        </div>
    @endif

    @if($user->hasRole("receptionist"))
        <div class="mt-8">
            @livewire("profile.update-receptionist-information", ["user" => $user])
        </div>
    @endif

</x-main-layout>
