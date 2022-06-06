@props(['title', 'subtitle' => null, 'color' => 'slate'])
@php
$classes = '';
$border = '';
switch ($color) {
    case 'slate':
        $border = 'border-slate-200';
        $classes = 'border-slate-400 bg-slate-50 text-slate-900';
        break;

    case 'green':
        $border = 'border-green-200';
        $classes = 'border-green-400 bg-green-50 text-green-900';
        break;

    case 'red':
        $border = 'border-red-200';
        $classes = 'border-red-400 bg-red-50 text-red-900';
        break;
}
@endphp

<article
    {{ $attributes->merge(['class' => $classes . ' border-2 rounded-lg px-4 py-3 mb-12 text-lg leading-relaxed shadow-lg']) }}>
    <header class="{{ $border }} border-b-2 flex items-baseline justify-between gap-2 pb-1 mb-2">
        <h3 class="text-xl font-medium">{{ $title }}</h3>

        @if (isset($subtitle) && $subtitle !== null)
            <span class="text-base text-center font-medium">{{ $subtitle }}</span>
        @endif
    </header>

    {{ $slot }}
</article>
