@props([
    'type' => 'button',
    'color' => 'primary'
])

@php

$colors = [
    'primary' => 'bg-primary hover:opacity-90 text-white',
    'success' => 'bg-green-600 hover:bg-green-700 text-white',
    'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
];

@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => ($colors[$color] ?? $colors['primary']) . ' px-5 py-3 rounded-xl font-semibold transition duration-300'
    ]) }}>

    {{ $slot }}

</button>