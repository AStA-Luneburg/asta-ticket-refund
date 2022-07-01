<x-app-layout>
    <x-page-title :subtitle="__('app.email-verification')" step="verification">
        {{ __('app.check-mail') }}
    </x-page-title>

    <x-content>
        <x-notification color="slate" title="Überlastung der Leuphana-Server" subtitle="01.07.22 11:56">
            <p class="mb-0">
                Es stellen gerade sehr viele Studierende einen Antrag. Daher kann es momentan leider ca. 10-20 Minuten dauern, bis der Leuphana Mail-Server unsere E-Mails zustellt. Wir sind im Kontakt mit dem MIZ und arbeiten an einer Lösung.<br><strong class="font-semibold">Falls du gar keine E-Mail erhältst, versuche es einfach ein wenig später erneut.</strong>
            </p>
        </x-notification>

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

            <form action="{{ route('verify') }}" method="post" class="w-full sm:w-auto">
                @csrf
                <input id="email" type="hidden" name="email" value="{{ $email }}" />
                <input id="privacy-check" type="hidden" name="privacy-check" value="on" />
                <x-button type="submit" class="btn btn-primary">
                    {{ __('app.resend-verification') }}
                </x-button>
            </form>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
