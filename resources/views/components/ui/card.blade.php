<div {{ $attributes->merge([
    'class' => 'bg-card border border-bordercolor rounded-2xl shadow-card p-6'
]) }}>
    {{ $slot }}
</div>