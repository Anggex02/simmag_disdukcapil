<button
    {{ $attributes->merge([
        'class' => 'px-5 py-3 rounded-xl bg-primary hover:bg-primary-hover transition duration-300 font-medium text-white'
    ]) }}>

    {{ $slot }}

</button>