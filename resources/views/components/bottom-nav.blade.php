<nav
    {{ $attributes->merge(['class' => 'flex flex-col-reverse sm:flex-row gap-4 justify-between items-center text-lg pt-5 border-t-2 border-slate-300']) }}>
    {{ $slot }}
</nav>
