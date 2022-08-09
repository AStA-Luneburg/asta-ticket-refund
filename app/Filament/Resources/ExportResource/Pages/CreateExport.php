<?php

namespace App\Filament\Resources\ExportResource\Pages;

use App\Facades\RefundManager;
use App\Filament\Resources\ExportResource;
use App\Models\Export;
use Filament\Resources\Pages\CreateRecord;

class CreateExport extends CreateRecord
{
    protected static string $resource = ExportResource::class;

    protected function handleRecordCreation(array $data): Export
    {
        return RefundManager::createExportWithRefunds();
    }
}
