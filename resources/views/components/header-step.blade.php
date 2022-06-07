@props(['index', 'active' => false])

@if ($active)
    <a
        {{ $attributes->merge(['class' => 'flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-sm md:text-base lg:text-lg font-medium text-asta-blue-900']) }}>
        @if (isset($index))
            <span
                class="inline-flex flex-shrink-0 items-center justify-center bg-asta-blue-200 rounded-full h-6 w-6 lg:h-8 lg:w-8 text-slate-50 font-bold text-sm md:text-lg lg:text-xl">{{ $index }}</span>
        @endif
        {{ $slot }}
    </a>
@else
    <a
        {{ $attributes->merge(['class' => 'flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-sm md:text-base lg:text-lg font-medium text-asta-blue-900 opacity-40']) }}>
        @if (isset($index))
            <span
                class="inline-flex flex-shrink-0  items-center justify-center bg-asta-blue-200 rounded-full h-6 w-6 lg:h-8 lg:w-8 text-slate-50 font-bold text-sm md:text-lg lg:text-xl">{{ $index }}</span>
        @endif
        {{ $slot }}
    </a>
@endif
