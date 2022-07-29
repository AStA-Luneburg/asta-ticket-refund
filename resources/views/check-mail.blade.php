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
            {!! __('app.mail-check.text-3', ['support-mail' => config('app.support-mail')]) !!}
        </p>



        <x-bottom-nav>
            <x-button element="link" :href="route('verify', ['reset_email' => 1])">
                {{ __('app.back') }}
            </x-button>

            <form action="{{ route('verify') }}" method="post" class="w-full flex flex-col sm:flex-row items-center gap-5 sm:w-auto">
                @csrf
                <input id="email" type="hidden" name="email" value="{{ $email }}" />
                <input id="privacy-check" type="hidden" name="privacy-check" value="on" />
                <x-button type="submit" class="btn btn-primary" id="resend-button" disabled>
                    {{ __('app.resend-verification') }}
                </x-button>
                <span class="text-slate-600" id="cooldown-seconds">
                    in 
                    <span>5</span> 
                    @if (App::getLocale() === 'de')
                        Sekunden
                    @else
                        seconds
                    @endif
                </span>
            </form>

            <script type="text/javascript">
                var cooldown = document.querySelector('#cooldown-seconds');
                var cooldownCounter = cooldown.querySelector('span');
                var resendButton = document.querySelector('#resend-button');
                var counter = 20;

                cooldownCounter.textContent = counter;

                setInterval(function () {
                    if (counter <= 1) {
                        resendButton.disabled = false;
                        cooldown.remove();
                    } else {
                        counter--;
                        cooldownCounter.textContent = counter;
                    }
                }, 1000);
            </script>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
