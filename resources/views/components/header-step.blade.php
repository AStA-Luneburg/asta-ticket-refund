@props(['index', 'href', 'active' => false])

@if ($active)
    <div href="{{ $href }}"
        class="flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-lg font-medium text-asta-blue-900">
        <span
            class="inline-flex flex-shrink-0 items-center justify-center bg-asta-blue-200 rounded-full h-8 w-8 text-slate-50 font-bold text-xl">{{ $index }}</span>
        {{ $slot }}
    </div>
@else
    <div href="{{ $href }}"
        class="flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-lg font-medium text-asta-blue-900 opacity-40">
        <span
            class="inline-flex flex-shrink-0  items-center justify-center bg-asta-blue-200 rounded-full h-8 w-8 text-slate-50 font-bold text-xl">{{ $index }}</span>
        {{ $slot }}
    </div>
@endif
