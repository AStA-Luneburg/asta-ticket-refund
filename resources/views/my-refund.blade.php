@php
$hasBeenSubmitted = isset($refund) && $refund;
$hasBeenExported = $hasBeenSubmitted && $refund->export !== null;
$name = $hasBeenSubmitted ? $refund->name : old('name');
$iban = $hasBeenSubmitted ? $refund->iban : old('iban');
@endphp

<x-app-layout>
    <x-page-title :subtitle="config('app.asta-name')" step="banking">
        {{ __('app.my-refund') }}

        <x-slot:content>
            @if ($hasBeenExported === true)
                <div
                    class="md:absolute md:top-0 md:right-0 md:bottom-0 flex items-center md:pb-4 md:mx-6 lg:mx-8 mt-6 md:mt-2">
                    <div
                        class="bg-green-100 text-base font-bold text-green-900 border-2 border-green-300 rounded md:rounded-xl flex justify-between items-center gap-2 px-2 py-1 w-full md:text-xl md:px-4 md:py-2 md:w-auto md:gap-0 md:flex-col shadow opacity-70">
                        <span>BEARBEITET</span>
                        <span class="text-base text-center font-medium">am
                            {{ $refund->export->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            @elseif ($hasBeenSubmitted === true)
                <div
                    class="md:absolute md:top-0 md:right-0 md:bottom-0 flex items-center md:pb-4 md:mx-6 lg:mx-8 mt-6 md:mt-2">
                    <div
                        class="bg-slate-100 text-base font-bold text-slate-900 border-2 border-slate-300 rounded md:rounded-xl flex justify-between items-center gap-2 px-2 py-1 w-full md:text-xl md:px-4 md:py-2 md:w-auto md:gap-0 md:flex-col shadow opacity-70">
                        <span>EINGEREICHT</span>
                        <span class="text-base text-center font-medium">am
                            {{ $refund->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            @endif
        </x-slot:content>
    </x-page-title>

    <x-content>
        <div class="mb-8">
            <x-label for="email" value="{{ __('app.email', ['university' => config('app.university')]) }}" />

            <div class="relative">
                <x-input id="email" class="block mt-1 w-full pl-14 bg-slate-200" type="text" name="email"
                    value="{{ $user->email }}" readonly disabled />
                <figure class="absolute left-0 top-0 bottom-0 flex items-center ml-5 text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                </figure>
            </div>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <div class="mb-10">
            <x-label for="matriculation-number" value="{{ __('app.matriculation-number') }}" />

            <div class="relative">
                <x-input id="matriculation-number" class="block mt-1 w-full pl-14 bg-slate-200" type="text"
                    name="matriculation-number" value="asdasdas" readonly disabled />
                <figure class="absolute left-0 top-0 bottom-0 flex items-center ml-5 text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                </figure>
            </div>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        @if ($errors->any())
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @endif

        {{-- @if (isset($success) && $success !== null)
            <div
                class="border-2 border-green-400 rounded-lg px-4 py-3 bg-green-50 text-green-900 mb-12 text-lg leading-relaxed shadow-lg">
                <h2 class="text-xl font-medium mb-2 pb-1 border-b-2 border-green-200">
                    {{ $success === 'created' ? __('app.success.saved.title') : __('app.success.submitted.title') }}
                </h2>

                <p>
                    {{ $success === 'created' ? __('app.success.saved.message') : __('app.success.submitted.message') }}
                </p>
                <p class="mb-2">
                    {{ __('app.success.email-notification') }}
                </p>
                <p>
                    {{ __('app.success.change-details') }}
                </p>
            </div>
        @endif --}}

        <h3 class="text-2xl font-medium mb-4">
            {{ __('app.your-bank-details') }}
        </h3>

        <form action="{{ route('my-refund.store') }}" method="post" class="w-full">
            @csrf

            <div class="mb-8">
                <x-label for="name" value="{{ __('app.your-name') }}" />

                <x-input id="name" class="{{ $errors->get('name') ? '!ring-red-600 !border-red-600' : '' }}"
                    type="text" name="name" value="{{ $name }}" required autofocus
                    placeholder="{{ __('app.name-placeholder') }}" />

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('name')" />
            </div>

            <div class="mb-8">
                <x-label for="iban" value="{{ __('app.your-iban') }}" />

                <x-input id="iban" class="{{ $errors->get('iban') ? '!ring-red-600 !border-red-600' : '' }}"
                    type="text" name="iban" value="{{ $iban }}" required autofocus
                    placeholder="{{ __('app.iban-placeholder') }}" />

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('iban')" />
            </div>

            <div class="mb-16">
                <x-label for="privacy-check" class="flex gap-3 items-start">
                    <input id="privacy-check"
                        class="rounded mt-1 w-5 h-5 block disabled:opacity-70 focus:checked:outline-asta-blue-800 hover:checked:bg-asta-blue-800 focus:checked:bg-asta-blue-800 checked:bg-asta-blue-800"
                        type="checkbox" name="privacy-check" required />

                    <input type="hidden" name="privacy-check" value="on">

                    <p class="font-regular text-base text-slate-800 leading-relaxed">{!! __('app.i_accept_privacy_policy', ['link' => config('app.privacy-url')]) !!}</p>
                </x-label>
            </div>

            <x-bottom-nav>
                <x-button element="link" href="{{ route('logout') }}">
                    {{ __('auth.logout') }}
                </x-button>

                <x-button type="submit" class="btn-primary">
                    {{ $hasBeenSubmitted ? __('app.save') : __('app.submit') }}
                </x-button>
            </x-bottom-nav>
        </form>
    </x-content>
</x-app-layout>
