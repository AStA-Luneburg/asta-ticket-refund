@php
$primary = $attributes->get('element');
@endphp

@if ($attributes->get('element') === 'link')
    <a {{ $attributes->merge(['type' => 'submit', 'class' => 'btn']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn']) }}>
        {{ $slot }}
    </button>
@endif
