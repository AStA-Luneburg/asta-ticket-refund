<?php

namespace App\Filament\Resources\ExportResource\Pages;

use App\Filament\Resources\ExportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

use App\Exports\RefundsExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class ViewExport extends ViewRecord
{
    protected static string $resource = ExportResource::class;

    protected function download($type) {
        $extension = strtolower($type);

        return RefundsExcelExport::withExportID($this->record->id)
            ->download("Export-{$this->record->id}_{$this->record->created_at->format('Y-m-d_H-m-s')}.{$extension}", $type);
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('excel-export')
                ->label('Als Excel exportieren')
                ->color('primary')
                ->action(function () {
                    return $this->download(\Maatwebsite\Excel\Excel::XLSX);
                }),
            Actions\Action::make('csv-export')
                ->label('Als CSV exportieren')
                ->color('primary')
                ->action(function () {
                    return $this->download(\Maatwebsite\Excel\Excel::CSV);
                }),
        ];
    }
}
