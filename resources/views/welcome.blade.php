<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl px-5 mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-4xl text-asta-blue-900 mb-px">
                {{ __('app.9-euro-ticket-refund') }}
            </h2>
            <h2 class="font-semibold text-3xl text-asta-blue-100 mb-5">
                {{ config('app.asta-name') }}
            </h2>

            <p class="text-xl text-slate-800 mb-10">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, illum illo! Sint expedita nemo odio.
                Expedita ipsum nisi saepe architecto vel fugiat laboriosam excepturi et amet distinctio. Tempore,
                aspernatur suscipit?
            </p>

            <nav class="flex justify-end items-center text-lg">
                <x-button element="link" :href="route('access')" class="btn-primary">
                    {{ __('app.continue') }}
                </x-button>
            </nav>


            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-slate-200">
                    You're logged in!
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
