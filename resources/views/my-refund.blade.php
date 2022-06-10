@php
$hasBeenSubmitted = isset($refund) && $refund !== null;
$hasBeenExported = $hasBeenSubmitted && $refund->export !== null;
$matriculation_number = $hasBeenSubmitted ? $refund->matriculation_number : old('matriculation_number');
$name = $hasBeenSubmitted ? old('name') ?? $refund->name : old('name');
$iban = $hasBeenSubmitted ? old('iban') ?? $refund->iban : old('iban');
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
            <x-notification color="slate" :title="__('app.notifications.success.submitted.title')" :subtitle="$refund->updated_at->format('d.m.Y H:m')">
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
            <x-notification color="green" :title="$success === 'saved'
                ? __('app.notifications.success.saved.title')
                : __('app.notifications.success.submitted.title')">
                <p>
                    {{ $success === 'saved' ? __('app.notifications.success.saved.message') : __('app.notifications.success.submitted.message') }}
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

        @if ($errors->any())
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @endif

        <form action="{{ route('my-refund.store') }}" method="post" class="w-full">
            @csrf

            @if (!$hasBeenSubmitted)
                <h3 class="text-2xl font-medium mb-4 mt-16">
                    {{ __('app.your-matriculation-number') }}
                </h3>
                <p class="mb-8 text-lg leading-relaxed">{!! __('app.why-matriculation') !!}</p>
            @endif

            <div class="mb-10">
                <x-label for="matriculation_number" value="{{ __('app.matriculation-number') }}" />

                @if ($hasBeenSubmitted && !$hasBeenExported)
                    <input type="hidden" name="matriculation_number" value="{{ $matriculation_number }}">
                    <x-disabled-input id="matriculation_number" name="matriculation_number"
                        value="{{ $matriculation_number }} – {{ $refund->student->name }}"
                        class="mb-4" />
                    <span class="text-slate-600">{!! __('app.matriculation_number_unchangeable', ['support-mail' => config('app.support-mail')]) !!}</span>
                @else
                    <x-input id="matriculation_number" min="4" max="8"
                        class="{{ $errors->get('matriculation_number') ? '!ring-red-600 !border-red-600' : '' }}"
                        type="text" name="matriculation_number" value="{{ $matriculation_number }}" required
                        autofocus placeholder="{{ __('app.matriculation-number-placeholder') }}" />
                @endif

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('matriculation_number')" />
            </div>

            <h3 class="text-2xl font-medium mb-6 mt-16">
                {{ __('app.your-bank-details') }}
            </h3>

            <div class="mb-8">
                <x-label for="name" value="{{ __('app.your-name') }}" />

                @if ($hasBeenExported)
                    <x-disabled-input id="name" name="name" value="{{ $name }}" />
                @else
                    <x-input id="name" class="{{ $errors->get('name') ? '!ring-red-600 !border-red-600' : '' }}"
                        type="text" name="name" value="{{ $name }}" required
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
                        type="text" name="iban" value="{{ $iban }}" required
                        placeholder="{{ __('app.iban-placeholder') }}" />
                @endif

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('iban')" />
            </div>

            <div class="mb-16">
                <x-label for="privacy-check" :class="$hasBeenSubmitted ? 'flex gap-3 items-start opacity-50' : 'flex gap-3 items-start '">
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
