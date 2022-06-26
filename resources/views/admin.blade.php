@php
$hasBeenSubmitted = isset($refund) && $refund !== null;
$hasBeenExported = $hasBeenSubmitted && $refund->export !== null;
$name = $hasBeenSubmitted ? $refund->name : old('name');
$iban = $hasBeenSubmitted ? $refund->iban : old('iban');
@endphp

<x-app-layout>
    <x-page-title step="banking" :hide-steps="true">
        <div class="">
            <p class="mb-2">Administration</p>
            <form action="{{ route('admin.create-export') }}" method="post">
                @csrf
                <x-button type="submit" class="w-auto">
                    Neue Anträge exportieren
                </x-button>
            </form>
        </div>

        <x-slot:content>
            <div
                class="md:absolute md:top-0 md:right-0 md:bottom-0 flex flex-col-reverse gap-5 md:flex-row md:gap-10 items-center md:pb-4 md:mx-6 lg:mx-8 mt-6 md:mt-2">
                <div
                    class="bg-slate-100 text-base font-bold text-slate-900 border-2 border-slate-300 rounded md:rounded-xl flex justify-start items-center gap-2 px-2 py-1 w-full md:text-xl md:px-4 md:py-2 md:w-auto md:gap-0 md:flex-col shadow opacity-70">
                    <span>{{ $refundCount }}</span>
                    <span class="text-base text-center font-medium">Unexportierte Anträge</span>
                </div>
                <div
                    class="bg-slate-100 text-base font-bold text-slate-900 border-2 border-slate-300 rounded md:rounded-xl flex justify-start items-center gap-2 px-2 py-1 w-full md:text-xl md:px-4 md:py-2 md:w-auto md:gap-0 md:flex-col shadow opacity-70">
                    <span>{{ $totalRefundCount }}</span>
                    <span class="text-base text-center font-medium">Alle Anträge</span>
                </div>
            </div>
        </x-slot:content>
    </x-page-title>

    <x-content>
        @foreach ($exports->reverse() as $export)
            <x-notification :title="'Export ' . $export->id . ' (' . count($export->refunds) . ' Anträge)'" :subtitle="$export->created_at">
                <nav class="flex gap-4">
                    <x-button element="link" :href="route('admin.export.json', ['export' => $export])" :download="'export-' . $export->id . '_' . $export->created_at . 'json'">Als JSON exportieren</x-button>
                    <x-button element="link" :href="route('admin.export.csv', ['export' => $export])" :download="'export-' . $export->id . '_' . $export->created_at . 'csv'">Als CSV exportieren</x-button>
                </nav>
            </x-notification>
        @endforeach
    </x-content>
</x-app-layout>
