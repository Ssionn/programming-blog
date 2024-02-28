@props(['active'])

@php

$classes = $active ?? false ? 'flex items-center rounded-lg text-white underline hover:text-white' : 'flex items-center rounded-lg';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>