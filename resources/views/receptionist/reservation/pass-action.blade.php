<div>
    @if(Auth::user()->hasRole("receptionist") && $reservation->state != "passed" && ($reservation->state == "accepted" || $reservation->state == "checked"))
        <a href="{{ route("receptionist.reservation.passed", $reservation) }}" class="text-sm text-pink-500 hover:text-pink-700">{{ __("Passed") }}</a>
    @endif
</div>
