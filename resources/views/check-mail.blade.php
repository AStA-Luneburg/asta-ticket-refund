<x-app-layout>
    <x-page-title :subtitle="__('app.email-verification')" step="verification">
        {{ __('app.check-mail') }}
    </x-page-title>

    <x-content>
        <p class="text-xl mb-4">
            Wir haben dir eine E-Mail an <span class="font-medium text-asta-red">{{ $email }}</span> gesendet.
        </p>
        <p class="text-xl mb-4">
            Bitte öffne diese E-Mail und klicke auf den Link, um deine E-Mail-Adresse zu bestätigen.
            Falls die E-Mail nicht in deinem Posteingang landet, suche auch im Spam-Ordner. Du kannst auch einen
            neuen Link anfordern.
        </p>
        <p class="text-xl mb-16">
            Falls du Probleme mit der Verifizierung hast, wende dich gerne an den
            <a href="mailto:{{ config('app.support-mail') }}"
                class="text-asta-red font-medium hover:opacity-70 underline">AStA
                Support</a>!
        </p>



        <x-bottom-nav>
            <x-button element="link" :href="route('access', ['reset_email' => 1])">
                {{ __('app.back') }}
            </x-button>

            <form action="{{ route('access') }}" method="post" class="w-full">
                @csrf

                <input id="email" type="hidden" name="email" value="{{ $email }}" />
                <x-button type="submit" class="btn btn-primary">
                    {{ __('app.resend-verification') }}
                </x-button>
            </form>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
