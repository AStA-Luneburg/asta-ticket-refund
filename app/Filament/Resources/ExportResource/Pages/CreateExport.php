<?php

namespace App\Filament\Resources\ExportResource\Pages;

use App\Filament\Resources\ExportResource;
use App\Models\Export;
use App\Models\Refund;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateExport extends CreateRecord
{
    protected static string $resource = ExportResource::class;

    protected function handleRecordCreation(array $data): Export
    {
        return DB::transaction(function () {
            $export = Export::create();

            Refund::where('export_id', null)
                ->orderBy('created_at')
                ->limit(config('app.export-limit'))
                ->update(['export_id' => $export->id]);

            return $export;
        });
    }
}
