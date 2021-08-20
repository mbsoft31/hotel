<textarea
    {{ $attributes->merge(['class' => "form-textarea border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md", "rows" => "2" ]) }}
>{{ $slot }}</textarea>
