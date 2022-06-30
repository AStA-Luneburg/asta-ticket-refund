<div class="relative">
    <x-input {{ $attributes->merge(['class' => 'block mt-1 w-full pl-14 bg-slate-200 text-slate-900']) }} type="text" readonly
        disabled />
    <figure class="absolute left-0 top-0 bottom-0 flex items-center ml-5 text-slate-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
        </svg>
    </figure>
</div>
