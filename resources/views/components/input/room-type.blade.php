@props(['types', "value" => null])

<select
    {{ $attributes->merge( [ "class" => "form-input rounded-md" ] ) }}
>
    @foreach ($types as $type)
        @if( ! is_null($value) && $value == $type->id )
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
        @else
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endif
    @endforeach
</select>
