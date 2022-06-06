@php
$element = $attributes->get('element') ?? 'article';
@endphp

<{{ $element }} {{ $attributes->merge(['class' => 'px-5 sm:px-6 lg:px-8 max-w-5xl mx-auto']) }}>
    {{ $slot }}
    </{{ $element }}>
