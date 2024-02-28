@props(['active'])

@php

$classes = $active ?? false ? 'flex items-center rounded-lg text-white' : 'flex items-center rounded-lg text-gray-600 hover:text-white';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>