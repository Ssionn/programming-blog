@props(['active'])

@php

$classes = $active ?? false ? 'flex items-center rounded-lg scale-105 transition ease-in-out delay-150 bg-orange-300 rounded-md px-4 py-1' : 'flex items-center rounded-lg hover:scale-105 transition ease-in-out delay-150 hover:bg-orange-300 rounded-md px-4 py-1';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
