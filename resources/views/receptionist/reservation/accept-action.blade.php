<div>
    @if(Auth::user()->hasRole("receptionist") && $reservation->state != "accepted" && $reservation->state != "checked" && $reservation->state != "passed")
        <a href="{{ route("receptionist.reservation.accept", $reservation) }}" class="text-sm text-gray-500 hover:text-gray-700">{{ __("Accept") }}</a>
    @endif
</div>
