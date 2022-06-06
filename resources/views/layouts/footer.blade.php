<footer class="pt-6 pb-12 bg-slate-200 shadow-inner">
    <x-content class="flex flex-col gap-2 md:flex-row md:gap-10 mb-8">
        <figure class="flex justify-center">
            <x-application-logo class="w-64 md:w-48 text-slate-400 fill-current" />
        </figure>
        <p class="pt-4 min-w-lg flex-1 text-slate-500 text-sm font-medium">
            <strong>Allgemeiner Student*innenausschuss</strong><br>
            Gebäude C9.103<br>
            Universitätsallee 1<br>
            21335 Lüneburg
        </p>
        <div class="pt-4 text-base flex-1 flex-shrink-0">
            <ul class="flex flex-col gap-2">
                <li><a href="{{ config('app.impressum-url') }}"
                        class="text-slate-600 hover:text-slate-800 font-medium">Impressum</a></li>
                <li><a href="{{ config('app.privacy-url') }}"
                        class="text-slate-600 hover:text-slate-800 font-medium">Datenschutzerklärung</a>
                </li>
                <li><a href="{{ config('app.faq-url') }}" class="text-slate-600 hover:text-slate-800 font-medium">FAQ –
                        Frequently Asked
                        Questions</a></li>
            </ul>
        </div>
    </x-content>
    <x-content class="flex gap-10 text-sm text-slate-500 py-4 hidden md:block">
        <p class="md:px-4">Betrieben durch den Allgemeinen Student*innenausschuss der Leuphana
            Universität Lüneburg.</p>
    </x-content>
</footer>
