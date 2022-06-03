<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl px-5 mx-auto sm:px-6 lg:px-8 text-asta-blue-900">
            <h2 class="font-semibold text-4xl text-asta-blue-900 mb-px">
                {{ __('app.student-verification') }}
            </h2>
            <h2 class="font-semibold text-3xl text-asta-blue-100 mb-8">
                {{ __('app.9-euro-ticket-refund') }}
            </h2>

            <p class="text-xl mb-5">
                {{ __('app.enter-email-to-continue') }}
            </p>

            <ul class="font-medium text-lg list-disc ml-10 mb-12">
                <li>{{ __('app.no-private-email') }}</li>
                <li>{!! __('app.example-mail-format', ['email' => config('app.mail-ending')]) !!}</li>
            </ul>

            <form action="{{ url()->current() }}" method="post" class="w-full" x-data="{ errors: {{ json_encode($errors->first('email') ?? null) }} }">
                @csrf

                <div class="mb-8">
                    <x-label for="email" :value="__('app.email', ['university' => config('app.university')])" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                        autofocus :placeholder="__('app.email-placeholder', ['example-mail' => config('app.example-mail')])" />

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>

                <div class="mb-16">
                    <x-label for="privacy-check" class="flex gap-3 items-start">
                        <input id="privacy-check"
                            class="rounded mt-1 w-5 h-5 block focus:checked:outline-asta-blue-800 hover:checked:bg-asta-blue-800 focus:checked:bg-asta-blue-800 checked:bg-asta-blue-800"
                            type="checkbox" name="privacy-check" required />

                        <p class="font-regular text-base text-slate-800 leading-relaxed">{!! __('app.i_accept_privacy_policy', ['link' => config('app.privacy-url')]) !!}</p>
                    </x-label>
                </div>

                <nav class=" flex justify-between items-center text-lg">
                    <x-button element="link" :href="route('welcome')">
                        {{ __('app.back') }}
                    </x-button>

                    <x-button type="submit" class="btn-primary">
                        {{ __('app.continue') }}
                    </x-button>
                </nav>
            </form>

            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-slate-200">
                    You're logged in!
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
