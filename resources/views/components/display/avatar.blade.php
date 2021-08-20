@props(["src", "alt" => "avatar"])
<div {{ $attributes->merge(["class" => "avatar rounded-full"]) }}>
    <!-- Avatar image -->
    <img class="avatar__image rounded-full w-full h-full" src="{{$src}}" alt="{{$alt}}"/>
</div>
