@props(['errors'])

@if ($errors->any())
    <ul {{ $attributes->merge(['class' => 'mt-3 list-disc list-inside text-sm text-red-600']) }}>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
