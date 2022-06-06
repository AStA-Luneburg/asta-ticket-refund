@props(['errors'])

@if (count($errors) > 0)
    <ul {{ $attributes->merge(['class' => 'mt-3 list-disc list-inside  text-red-600']) }}>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
