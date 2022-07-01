<x-app-layout>
    <x-page-title :subtitle="__('app.email-verification')" step="verification">
        {{ __('app.check-mail') }}
    </x-page-title>

    <x-content>
        <x-notification color="slate" title="Überlastung der Leuphana-Server" subtitle="01.07.22 11:56">
            @if (App::getLocale() === 'de')
                <p class="mb-4">
                    Derzeit versuchen viele Studierende, ihre Rückerstattungsanträge zu stellen.
                </p>
                <p class="mb-4">
                    Leider hat der Mailserver der Leuphana angefangen, unsere E-Mails zu drosseln, sodass es bis zu 30-45 Minuten dauern kann, bis diese ankommen. Wir sind in Kontakt mit dem IT-Support der Leuphana, aber die Drosselung unseres Servers wurde noch nicht aufgehoben.
                </p>
                <p class="mb-0 font-semibold"> 
                    Bitte warte noch ein wenig, bis die Bestätigungsmail eintrifft. Wenn sie nach einer Stunde immer noch nicht eingetroffen ist, versuche es bitte erneut. :)
                </p>
            @else
                <p class="mb-4">
                    Currently there are a lot of students trying to submit their refund requests.
                </p>
                <p class="mb-4">
                    Unfortunately, the Leuphana mail server is starting to throttle our mails, so they can take up to 30-45 minutes to arrive. We’re in contact with Leuphana’s IT-Support, however, they have not stopped blocking our server.
                </p>
                <p class="mb-0 font-semibold"> 
                    Please wait a little bit longer until the verification mail arrives. If it still has not arrived after an hour, please try again. :)
                </p>
            @endif
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
