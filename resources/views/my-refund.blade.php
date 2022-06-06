@php
$hasBeenSubmitted = isset($refund) && $refund !== null;
$hasBeenExported = $hasBeenSubmitted && $refund->export !== null;
$name = $hasBeenSubmitted ? $refund->name : old('name');
$iban = $hasBeenSubmitted ? $refund->iban : old('iban');
@endphp

<x-app-layout>
    <x-page-title :subtitle="config('app.asta-name')" step="banking">
        {{ __('app.my-refund') }}
    </x-page-title>

    <x-content>
        @if ($hasBeenExported === true)
            <x-notification color="green" :title="__('app.notifications.exported.title')" :subtitle="$refund->export->created_at->format('d.m.Y')">
                <p class="mb-0">
                    {{ __('app.notifications.exported.message') }}
                </p>
            </x-notification>
        @elseif ($hasBeenSubmitted === true && !isset($success))
            <x-notification color="slate" :title="__('app.notifications.success.submitted.title')">
                <p>
                    {{ __('app.notifications.success.submitted.message') }}
                </p>
                <p class="mb-2">
                    {{ __('app.notifications.success.email-notification') }}
                </p>
                <p>
                    {{ __('app.notifications.success.change-details') }}
                </p>
            </x-notification>
        @elseif (isset($success) && $success !== null)
            <x-notification color="green" :title="$success === 'created'
                ? __('app.notifications.success.saved.title')
                : __('app.notifications.success.submitted.title')">
                <p>
                    {{ $success === 'created' ? __('app.notifications.success.saved.message') : __('app.notifications.success.submitted.message') }}
                </p>
                <p class="mb-2">
                    {{ __('app.notifications.success.email-notification') }}
                </p>
                <p>
                    {{ __('app.notifications.success.change-details') }}
                </p>
            </x-notification>
        @endif

        <div class="mb-8">
            <x-label for="email" value="{{ __('app.email', ['university' => config('app.university')]) }}" />

            <x-disabled-input id="email" name="email" value="{{ $user->email }}" />

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        <div class="mb-10">
            <x-label for="matriculation-number" value="{{ __('app.matriculation-number') }}" />

            <x-disabled-input id="matriculation-number" name="matriculation-number" value="asdasdas" />

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>

        @if ($errors->any())
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @endif

        <h3 class="text-2xl font-medium mb-4">
            {{ __('app.your-bank-details') }}
        </h3>

        <form action="{{ route('my-refund.store') }}" method="post" class="w-full">
            @csrf

            <div class="mb-8">
                <x-label for="name" value="{{ __('app.your-name') }}" />

                @if ($hasBeenExported)
                    <x-disabled-input id="name" name="name" value="{{ $name }}" />
                @else
                    <x-input id="name" class="{{ $errors->get('name') ? '!ring-red-600 !border-red-600' : '' }}"
                        type="text" name="name" value="{{ $name }}" required autofocus
                        placeholder="{{ __('app.name-placeholder') }}" />
                @endif

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('name')" />
            </div>

            <div class="mb-8">
                <x-label for="iban" value="{{ __('app.your-iban') }}" />

                @if ($hasBeenExported)
                    <x-disabled-input id="iban" name="iban" value="{{ $iban }}" />
                @else
                    <x-input id="iban" class="{{ $errors->get('iban') ? '!ring-red-600 !border-red-600' : '' }}"
                        type="text" name="iban" value="{{ $iban }}" required autofocus
                        placeholder="{{ __('app.iban-placeholder') }}" />
                @endif

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('iban')" />
            </div>

            <div class="mb-16">
                <x-label for="privacy-check"
                    class="flex gap-3 items-start @if ($hasBeenSubmitted) opacity-50 @endif">
                    <input id="privacy-check"
                        class="rounded mt-1 w-5 h-5 block disabled:opacity-70 focus:checked:outline-asta-blue-800 hover:checked:bg-asta-blue-800 focus:checked:bg-asta-blue-800 checked:bg-asta-blue-800"
                        type="checkbox" name="privacy-check" required
                        @if ($hasBeenSubmitted) readonly disabled checked @endif />

                    <input type="hidden" name="privacy-check" value="on">

                    <p class="font-regular text-base text-slate-800 leading-relaxed">{!! __('app.i_accept_privacy_policy', ['link' => config('app.privacy-url')]) !!}</p>
                </x-label>
            </div>

            <x-bottom-nav>
                <x-button element="link" href="{{ route('logout') }}">
                    {{ __('auth.logout') }}
                </x-button>

                <x-button type="submit" class="btn-primary" :disabled="$hasBeenExported">
                    {{ $hasBeenSubmitted ? __('app.save') : __('app.submit') }}
                </x-button>
            </x-bottom-nav>
        </form>
    </x-content>
</x-app-layout>
