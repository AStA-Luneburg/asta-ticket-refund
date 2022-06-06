<x-app-layout>
    <x-page-title :subtitle="config('app.asta-name')" step="welcome">
        {{ __('app.9-euro-ticket-refund') }}
    </x-page-title>

    <x-content>
        <p class="text-xl text-slate-800 mb-10">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, illum illo! Sint expedita nemo odio.
            Expedita ipsum nisi saepe architecto vel fugiat laboriosam excepturi et amet distinctio. Tempore,
            aspernatur suscipit?
        </p>

        <x-bottom-nav class="!justify-end">
            <x-button element="link" :href="route('access')" class="btn-primary self-end">
                {{ __('app.continue') }}
            </x-button>
        </x-bottom-nav>
    </x-content>
</x-app-layout>
