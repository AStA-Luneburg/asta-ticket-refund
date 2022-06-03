@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-slate-700']) }}>
    {{ $value ?? $slot }}
</label>
