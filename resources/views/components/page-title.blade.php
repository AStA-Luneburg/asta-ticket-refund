@props(['subtitle', 'step' => 'welcome'])

<header {{ $attributes->merge(['class' => 'relative bg-slate-50 border-b-2 border-slate-300 py-8 md:pt-0 mb-8']) }}>
    <nav class="hidden md:block bg-slate-50 border-b-0 border-slate-300 mb-8">
        <x-content class="relative flex items-stretch gap-3 py-2">
            @if ($step === 'welcome')
            @endif
            <x-header-step href="#" index="1" active="{{ $step === 'welcome' ? true : false }}">
                Anleitung
            </x-header-step>
            <x-header-step href="#" index="2" active="{{ $step === 'verification' ? true : false }}">
                Studierenden-Verifizierung
            </x-header-step>
            <x-header-step href="#" index="3" active="{{ $step === 'banking' ? true : false }}">
                Bankverbindung angeben
            </x-header-step>
        </x-content>
    </nav>
    <x-content class="relative">
        <h1 class="font-semibold text-2xl sm:text-4xl text-asta-blue-900 mb-1">
            {{ $slot }}
        </h1>
        <h2 class="font-semibold text-2xl sm:text-3xl text-asta-blue-100">
            {{ $subtitle ?? '' }}
        </h2>

        @if (isset($content))
            {{ $content }}
        @endif
    </x-content>
</header>
