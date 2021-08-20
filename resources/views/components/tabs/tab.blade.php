@props(["active" => false])
<div {{ $attributes->class([ "tabs__tab--active border border-b-0 rounded-tl-md rounded-tr-md" => $active, "tabs__tab--inactive border-0 border-b" => !$active ]) }}>
    {{ $slot }}
</div>
