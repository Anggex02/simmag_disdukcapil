<div {{ $attributes->merge([
    'class' => 'bg-card rounded-xl2 shadow-card border border-bordercolor p-6'
]) }}>
    {{ $slot }}
</div>