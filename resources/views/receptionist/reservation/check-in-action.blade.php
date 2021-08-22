<div>
    @if(Auth::user()->hasRole("receptionist") && ($reservation->state == "accepted" || $reservation->state == "passed"))
        <a href="{{ route("receptionist.reservation.checkIn", $reservation) }}" class="text-sm text-gray-500 hover:text-gray-700">{{ __("Check in") }}</a>
    @endif
</div>
