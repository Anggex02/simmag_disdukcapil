@props([
    'type' => 'success'
])

@php

    $color = [

        'success' => 'bg-green-600',

        'danger' => 'bg-red-600',

        'warning' => 'bg-yellow-500 text-black',

        'info' => 'bg-sky-600'

    ];

@endphp
 
 
   <div {{ $attributes->merge([
    'class' => ($color[$type] ?? $color['success']) . ' rounded-xl px-5 py-4 text-white shadow-card'
]) }}>

{{ $slot }}

</div>