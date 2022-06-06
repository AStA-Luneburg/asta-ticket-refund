@props(['subtitle', 'step' => 'welcome', 'hide-steps' => false])

<header {{ $attributes->merge(['class' => 'relative bg-slate-50 border-b-2 border-slate-300 pb-8 md:pt-0 mb-8']) }}>
    @if (!isset($hideSteps) || !$hideSteps)
        <nav class="hidden sm:block bg-slate-50 border-b-0 border-slate-300 mb-4 md:mb-8">
            <x-content class="relative flex items-stretch flex-col gap-0 md:flex-row md:gap-3 py-2">
                <x-header-step href="#" index="1" active="{{ $step === 'welcome' ? true : false }}">
                    {{ __('app.steps.first') }}
                </x-header-step>
                <x-header-step href="#" index="2" active="{{ $step === 'verification' ? true : false }}">
                    {{ __('app.steps.second') }}
                </x-header-step>
                <x-header-step href="#" index="3" active="{{ $step === 'banking' ? true : false }}">
                    {{ __('app.steps.third') }}
                </x-header-step>
            </x-content>
        </nav>
    @endif
    <x-content class="relative">
        <h1 class="font-semibold text-2xl sm:text-3xl md:text-4xl text-asta-blue-900 mb-1">
            {{ $slot }}
        </h1>
        <h2 class="font-semibold text-2xl md:text-3xl text-asta-blue-100">
            {{ $subtitle ?? '' }}
        </h2>

        @if (isset($content))
            {{ $content }}
        @endif
    </x-content>
</header>
