<x-app-layout>
    <x-page-title :subtitle="config('app.asta-name')" step="welcome">
        {{ __('app.9-euro-ticket-refund') }}
    </x-page-title>

    <x-content class="text-xl  text-asta-blue-900 mb-10 leading-relaxed">
        @if (App::getLocale() === 'de')
            <p class="mb-5">
                <strong>Liebe Studierende</strong>,
            </p>
            <p class="mb-5">
                Für euer Semesterticket, das ihr für den Busverkehr im Landkreis Lüneburg und die Nahverkehrszüge in Niedersachsen und Bremen nutzen könnt, habt ihr im Sommersemester 2022 157,67 € bezahlt.
            </p>
            <p class="mb-5">
                Mit der Einführung des sogenannten 9-Euro-Tickets wurde euer Semesterticket für die Monate Juni, Juli und August obsolet.
                Für diese Monate zahlen wir den Bus- und Bahnunternehmen folglich nur 9 Euro pro Student*in und Monat.
            </p>
            <p class="mb-5">
                Doch was heißt das konkret für euch?
            </p>
            <p class="mb-5">
                <strong>Ihr bekommt daher 51,84 € eures Semesterbeitrages für das Sommersemester 2022 zurück!</strong>
            </p>
            <p class="mb-5">
                Da wir eure Kontoverbindungen nicht vorliegen haben, können wir diesen Beitrag nicht automatisch an alle Studierende überweisen.
            </p>
            <p class="mb-5">
                <strong>Daher muss jede*r Student*in die Erstattung der 51,84 € über diese Website beantragen.</strong>
            </p>
            <p class="mb-5">
                Antragsberechtigt sind alle Studierenden, die im Sommersemester 2022 ihren Semesterbeitrag gezahlt haben.<br>
                <i>Ausgenommen: Studierende der Professional School und Studierende, die eine Rückerstattung auf anderem Wege erhalten haben.</i>
            </p>
            <p class="mb-5">
                Die Möglichkeit der Rückerstattung steht allen antragsberechtigten Studierenden bis zum 31. Dezember 2025 zur Verfügung. Wir bitten euch, die Antragstellung möglichst schnell vorzunehmen.
            </p>
            <p class="mb-20">
                Mit besten Grüßen aus dem AStA,<br>
                <strong>Deine AStA-Sprecher*innen</strong>
            </p>
        @else
            <p class="mb-5">
                <strong>Dear students</strong>,
            </p>
            <p class="mb-5">
                For your semester ticket, which you can use for bus transport in the district of Lüneburg and local trains in Lower Saxony and Bremen, you paid 157,67 € in the summer semester 2022.
            </p>
            <p class="mb-5">
                With the introduction of the so-called 9-Euro-Ticket, your semester ticket became obsolete for the months of June, July and August.
                For these months, we will therefore only pay the bus and train companies €9 per student per month.
            </p>
            <p class="mb-5">
                But what does that mean for you?
            </p>
            <p class="mb-5">
                <strong>You will get back 51,84 € of your semester fee for the summer semester 2022!</strong>
            </p>
            <p class="mb-5">
                Since we do not have your bank account details, we cannot automatically transfer this fee to all students.
            </p>
            <p class="mb-5">
                <strong>Therefore, each student has to apply for the refund of the 51,84 € via this website.</strong>
            </p>
            <p class="mb-5">
                All students who have paid their semester fee in the summer semester 2022 are eligible to apply.<br>
                <i>Excluded: Professional School students and students who have received a refund through other means.</i>
            </p>
            <p class="mb-5">
                The refund option is available to all eligible students until December 31, 2025. We ask that you apply as soon as possible.
            </p>
            <p class="mb-20">
                With best regards from the AStA,<br>
                <strong>Your AStA spokespersons</strong>
            </p>
        @endif
        
        <h2 class=" text-3xl text-center font-semibold mb-20">
            {{ __('app.welcome.how-does-it-work') }}
        </h2>

        <div class="flex flex-col gap-20 ">
            <section class="flex gap-10 lg:gap-16 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative ">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">1.</strong>
                        {{ __('app.welcome.step-1.title', ['university' => config('app.university')]) }}
                    </h3>
                    <p class="leading-relaxed">
                        {{ __('app.welcome.step-1.text', ['university' => config('app.university')]) }}</p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="{{ url('/img/verification.svg') }}"
                        class="max-w-[300px]">
                </figure>

            </section>

            <section class="flex gap-24 lg:gap-32 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">2.</strong>
                        {{ __('app.welcome.step-2.title') }}
                    </h3>
                    <p class="mb-4">{{ __('app.welcome.step-2.text-1') }}</p>
                    <p class="">{{ __('app.welcome.step-2.text-2') }}</p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="{{ url('/img/banking.svg') }}"
                        class="max-w-[240px]">
                </figure>

            </section>

            <section class="flex gap-20 lg:gap-28 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">3.</strong>
                        {{ __('app.welcome.step-3.title') }}
                    </h3>
                    <p class="mb-4">{{ __('app.welcome.step-3.text') }}</p>
                </div>
                <figure class="hidden md:block pt-8 opacity-70"><img src="{{ url('/img/waiting.svg') }}"
                        class="max-w-[250px]">
                </figure>

            </section>
        </div>

        <x-bottom-nav class="!justify-end mt-20">
            <x-button element="link" :href="route('verify')" class="btn-primary self-end">
                {{ __('app.continue') }}
            </x-button>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
