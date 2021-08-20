@props(['id'])

<div class="relative text-gray-400 focus-within:text-gray-600">
    <div class="absolute inset-y-0 left-0 px-3 flex items-center pointer-events-none">
        <i class="fas fa-search"></i>
    </div>
    <input
        id="{{ $id ?? '' }}"
        {{ $attributes->merge(["class"=>"py-2 bg-white placeholder-gray-400 text-gray-900 border
    rounded-lg appearance-none w-full block pl-12 focus:outline-none"]) }}
    >
</div>
