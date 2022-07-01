<x-app-layout>
    <x-page-title :subtitle="__('app.email-verification')" step="verification">
        {{ __('app.check-mail') }}
    </x-page-title>

    <x-content>
        @if (App::getLocale() === 'de')
            <x-notification color="slate" title="Überlastung der Leuphana-Server" subtitle="01.07.22 13:15">
                <p class="mb-4">
                    Derzeit versuchen viele Studierende, ihre Rückerstattungsanträge zu stellen.
                </p>
                <p class="mb-4">
                    Leider hat der Mailserver der Leuphana angefangen, unsere E-Mails zu drosseln, sodass es bis zu 30-45 Minuten dauern kann, bis diese ankommen. Wir sind in Kontakt mit dem MIZ, aber die Drosselung unseres Servers wurde noch nicht aufgehoben.
                </p>
                <p class="mb-0 font-semibold"> 
                    Bitte warte noch ein wenig, bis die Bestätigungsmail eintrifft. Wenn sie nach einer Stunde immer noch nicht eingetroffen ist, versuche es bitte erneut. :)
                </p>
            </x-notification>
        @else
            <x-notification color="slate" title="Throttling by Leuphana's servers" subtitle="01.07.22 13:15">
                <p class="mb-4">
                    Currently there are a lot of students trying to submit their refund requests.
                </p>
                <p class="mb-4">
                    Unfortunately, the Leuphana mail server is starting to throttle our mails, so they can take up to 30-45 minutes to arrive. We’re in contact with Leuphana’s IT-Support, however, they have not stopped blocking our server.
                </p>
                <p class="mb-0 font-semibold"> 
                    Please wait a little bit longer until the verification mail arrives. If it still has not arrived after an hour, please try again. :)
                </p>
            </x-notification>
        @endif

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
