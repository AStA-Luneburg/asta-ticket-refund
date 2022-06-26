<nav x-data="{ open: false }" class="bg-astas-blue-500 bg-slate-50 border-sb border-blue-900 pb-6 md:pb-8">
    <!-- Primary Navigation Menu -->
    <x-content>
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="block w-auto h-16 py-1">
                        <x-application-logo-colored class="h-full font-bold text-white" />
                    </a>
                </div>
            </div>

            @if (Route::currentRouteName() !== 'welcome')
                <div class="hidden sm:ml-6 sm:flex flex-col justify-center items-center">
                    <h1 class="font-medium text-xl text-slate-700">{{ __('app.9-euro-ticket-refund') }}</h1>
                    {{-- <h2 class="font-bold text-base text-slate-600 -mt-1">{{ config('app.asta-name') }}</h2> --}}
                </div>
            @endif

            <section class="flex justify-between">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-slate-600 hover:text-slate-500 hover:border-slate-300 focus:outline-none focus:text-slate-400 focus:border-slate-300 transition duration-150 ease-in-out">
                                <div>{{ __('app.languages.' . App::getLocale()) }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('locale', ['locale' => 'de', 'redirect-url' => url()->current()])">
                                {{ __('app.languages.de') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('locale', ['locale' => 'en', 'redirect-url' => url()->current()])">
                                {{ __('app.languages.en') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </section>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-200 focus:outline-none focus:bg-slate-300 focus:text-slate-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </x-content>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="py-4 border-y-2 border-slate-300 text-slate-500 bg-slate-200">
            <div class="flex flex-col px-4 font-medium text-lg">
                <a href="{{ route('locale', ['locale' => 'de']) }}"
                    class="@if (App::getLocale() === 'de') text-slate-800 @endif">
                    {{ __('app.languages.de') }}</a>
                <a href="{{ route('locale', ['locale' => 'en']) }}"
                    class="@if (App::getLocale() === 'en') text-slate-800 @endif">
                    {{ __('app.languages.en') }}</a>
            </div>
        </div>
    </div>
</nav>
