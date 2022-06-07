<x-app-layout>
    <x-page-title :subtitle="config('app.asta-name')" step="welcome">
        {{ __('app.9-euro-ticket-refund') }}
    </x-page-title>

    <x-content class="text-xl  text-asta-blue-900 mb-10 leading-relaxed">
        <p class="mb-5">
            {!! __('app.welcome.welcome-1') !!}
        </p>
        <p class="mb-20">
            {!! __('app.welcome.welcome-2') !!}
        </p>
        <h2 class=" text-3xl text-center font-semibold mb-20">
            {{ __('app.welcome.how-does-it-work') }}
        </h2>

        <div class="flex flex-col gap-20 ">
            <section class="flex gap-10 lg:gap-16 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative ">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">1.</strong>
                        {{ __('app.welcome.step-1.title', ['university' => config('app.university')]) }}
                    </h3>
                    <p class="leading-relaxed">
                        {{ __('app.welcome.step-1.text', ['university' => config('app.university')]) }}</p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="{{ url('/img/verification.svg') }}"
                        class="max-w-[300px]">
                </figure>

            </section>

            <section class="flex gap-24 lg:gap-32 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">2.</strong>
                        {{ __('app.welcome.step-2.title') }}
                    </h3>
                    <p class="mb-4">{{ __('app.welcome.step-2.text-1') }}</p>
                    <p class="">{{ __('app.welcome.step-2.text-2') }}</p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="{{ url('/img/banking.svg') }}"
                        class="max-w-[240px]">
                </figure>

            </section>

            <section class="flex gap-20 lg:gap-28 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">3.</strong>
                        {{ __('app.welcome.step-3.title') }}
                    </h3>
                    <p class="mb-4">{{ __('app.welcome.step-3.text') }}</p>
                </div>
                <figure class="hidden md:block pt-8 opacity-70"><img src="{{ url('/img/waiting.svg') }}"
                        class="max-w-[250px]">
                </figure>

            </section>
        </div>

        <x-bottom-nav class="!justify-end mt-20">
            <x-button element="link" :href="route('verify')" class="btn-primary self-end">
                {{ __('app.continue') }}
            </x-button>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
