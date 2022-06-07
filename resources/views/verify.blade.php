<x-app-layout>
    <x-page-title :subtitle="__('app.9-euro-ticket-refund')" step="verification">
        {{ __('app.student-verification') }}
    </x-page-title>

    <x-content>
        <p class="text-xl mb-5 leading-relaxed">
            {{ __('app.enter-email-to-continue', ['university-full' => config('app.university-full')]) }}
        </p>

        <ul class="font-medium text-lg list-disc ml-10 mb-12 leading-relaxed">
            <li>{{ __('app.no-private-email') }}</li>
            <li>{!! __('app.example-mail-format', ['email' => config('app.mail-ending')]) !!}</li>
        </ul>

        @error('user-not-found')
            <div
                class="border-2 border-red-400 rounded-lg px-4 py-3 bg-red-50 text-red-900 mb-12 text-lg leading-relaxed shadow-lg">
                <h2 class="text-xl font-medium mb-2 pb-1 border-b-2 border-red-200">
                    {{ __('app.verify-error.could-not-verify') }}
                </h2>
                {!! $errors->get('user-not-found')[0] !!}
            </div>
        @enderror

        <form action="{{ route('verify') }}" method="post" class="w-full" x-data="{ errors: {{ json_encode($errors->first('email') ?? null) }} }">
            @csrf

            <div class="mb-8">
                <x-label for="email" :value="__('app.email', ['university' => config('app.university')])" />

                <x-input id="email" :class="'block mt-1 w-full ' .
                    ($errors->get('email') || $errors->get('user-not-found') ? '!ring-red-600 !border-red-600' : '')" type="email" name="email" :value="old('email')" :placeholder="__('app.email-placeholder', ['example-mail' => config('app.example-mail')])"
                    required autofocus />

                <x-auth-validation-errors class="mb-4" :errors="$errors->get('email')" />
            </div>
            <script type="module">
                const emailInput = document.querySelector('#email');
                const hasEmailError = {!! count($errors->get('email') ?? []) > 0 ? 'true' : 'false' !!};
                emailInput.addEventListener('input', e => {
                    const emailHasCorrectEnding = e.target.value.endsWith('{{ config('app.mail-ending') }}');
                    if (hasEmailError && emailHasCorrectEnding) {
                        document.querySelector('#email').classList.remove('!ring-red-600');
                        document.querySelector('#email').classList.remove('!border-red-600');
                    } else if (hasEmailError && !emailHasCorrectEnding) {
                        document.querySelector('#email').classList.add('!ring-red-600');
                        document.querySelector('#email').classList.add('!border-red-600');
                    }
                });

                // emailInput.addEventListener("input", () => {
                //     emailInput.setCustomValidity("");
                //     emailInput.checkValidity();
                //     console.log(emailInput.checkValidity());
                // });
            </script>

            <div class="mb-16">
                <x-label for="privacy-check" class="flex gap-3 items-start">
                    <input id="privacy-check"
                        class="rounded mt-1 w-5 h-5 block focus:checked:outline-asta-blue-800 hover:checked:bg-asta-blue-800 focus:checked:bg-asta-blue-800 checked:bg-asta-blue-800"
                        type="checkbox" name="privacy-check" required />

                    <p class="font-regular text-base text-slate-800 leading-relaxed">{!! __('app.i_accept_privacy_policy', ['link' => config('app.privacy-url')]) !!}</p>
                </x-label>
                <x-auth-validation-errors class="mb-4" :errors="$errors->get('privacy-check')" />
            </div>

            <x-bottom-nav>
                <x-button element="link" :href="route('welcome')">
                    {{ __('app.back') }}
                </x-button>

                <x-button type="submit" class="btn-primary">
                    {{ __('app.continue') }}
                </x-button>
            </x-bottom-nav>
        </form>
    </x-content>
</x-app-layout>
