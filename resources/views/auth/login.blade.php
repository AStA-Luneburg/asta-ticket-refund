<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-auto h-36 fill-current text-slate-500" />
            </a>
        </x-slot>

        <h3 class="font-medium mb-1">Willkommen beim AStA Lüneburg!
        </h3>
        <p class="mb-5 text-slate-900 leading-relaxed">
            Wie du vielleicht schon weißt, ist dein Semesterticket auch als 9-Euro-Ticket gültig.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            {{-- <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div> --}}

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="privacy_policy" class="inline-flex items-center">
                    <input id="privacy_policy" type="checkbox"
                        class="rounded border-slate-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="privacy_policy">
                    <span class="ml-2 text-sm text-slate-600">
                        {!! __('app.i_accept_privacy_policy') !!}
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-slate-600 hover:text-slate-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
