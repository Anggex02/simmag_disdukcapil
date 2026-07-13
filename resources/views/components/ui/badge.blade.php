@props([
    'color' => 'green'
])

@php

$colors = [
    'green' => 'bg-green-600',
    'red' => 'bg-red-600',
    'yellow' => 'bg-yellow-500',
    'blue' => 'bg-blue-600',
];

@endphp

<span
    {{ $attributes->merge([
        'class' => ($colors[$color] ?? $colors['green']) . ' text-white text-xs px-3 py-1 rounded-full'
    ]) }}>

    {{ $slot }}

</span>