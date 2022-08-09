<?php

namespace App\Filament\Resources\ExportResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Maatwebsite\Excel\Excel;
use App\Filament\Resources\ExportResource;
use App\Facades\RefundManager;

class ViewExport extends ViewRecord
{
    protected static string $resource = ExportResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('excel-export')
                ->label('Als Excel herunterladen')
                ->icon('heroicon-o-download')
                ->color('primary')
                ->action(function () {
                    return RefundManager::downloadExport($this->record, Excel::XLSX);
                }),
            Actions\Action::make('csv-export')
                ->label('Als CSV herunterladen')
                ->icon('heroicon-o-download')
                ->color('primary')
                ->action(function () {
                    return RefundManager::downloadExport($this->record, Excel::CSV);
                })
        ];
    }
}
