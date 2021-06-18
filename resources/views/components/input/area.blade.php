<textarea
    {{ $attributes->merge(['class' => "form-textarea rounded-md", "rows" => "2" ]) }}
>{{ $slot }}</textarea>
