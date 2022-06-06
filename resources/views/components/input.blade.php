@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full rounded-md text-lg shadow-sm border-slate-300 focus:ring focus:ring-asta-blue-600']) !!}>
