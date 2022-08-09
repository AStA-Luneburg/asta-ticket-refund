<?php

namespace App\Filament\Resources\ExportResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Facades\RefundManager;
use App\Filament\Resources\ExportResource;
use App\Models\Export;

class CreateExport extends CreateRecord
{
    protected static string $resource = ExportResource::class;

    protected function handleRecordCreation(array $data): Export
    {
        return RefundManager::createExportWithRefunds();
    }
}
