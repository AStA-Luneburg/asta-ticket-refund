<x-app-layout>
    <x-page-title :subtitle="__('app.email-verification')" step="verification">
        {{ __('app.check-mail') }}
    </x-page-title>

    <x-content>
        <p class="text-xl mb-4">
            {!! __('app.mail-check.text-1', ['email' => $email]) !!}
        </p>
        <p class="text-xl mb-4">
            {{ __('app.mail-check.text-2') }}
        </p>
        <p class="text-xl mb-16">
            {!! __('app.mail-check.text-3', ['support-email' => config('app.support-mail')]) !!}
        </p>



        <x-bottom-nav>
            <x-button element="link" :href="route('verify', ['reset_email' => 1])">
                {{ __('app.back') }}
            </x-button>

            <form action="{{ route('verify') }}" method="post" class="w-full sm:w-auto">
                @csrf

                <input id="email" type="hidden" name="email" value="{{ $email }}" />
                <x-button type="submit" class="btn btn-primary">
                    {{ __('app.resend-verification') }}
                </x-button>
            </form>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
