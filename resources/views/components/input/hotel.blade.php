@props(['hotels', "value" => null])

<select multiple
    {{ $attributes->merge( [ "class" => "form-input rounded-md" ] ) }}
>
    @foreach ($hotels as $hotel)
        @if( ! is_null($value) && $value == $hotel->id )
            <option value="{{ $hotel->id }}" selected>{{ $hotel->name }}</option>
        @else
            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
        @endif
    @endforeach
</select>
