@props(['users', "value" => null])

<select multiple
    {{ $attributes->merge( [ "class" => "form-input rounded-md" ] ) }}
>
    @foreach ($users as $user)
        @if( ! is_null($value) && $value == $user->id )
            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
        @else
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endif
    @endforeach
</select>
