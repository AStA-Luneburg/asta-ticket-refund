<?php

namespace App\Filament\Actions\Tables;

use Illuminate\Database\Eloquent\Collection;
use Filament\Support\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\BulkAction;
use Maatwebsite\Excel\Excel;
use App\Facades\RefundManager;

class DownloadCSVBulk extends BulkAction
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'bulk-download-csv';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('CSV herunterladen');
        $this->icon('heroicon-o-download');
        $this->action(function () {
            return $this->process(static function (Collection $records) {
                return RefundManager::downloadRefunds($records, Excel::CSV);
            });
        });
    }
}

// <!-- BulkAction::make('excel-download')
// ->label('Excel herunterladen')
// ->icon('heroicon-o-download')
// ->action(function (Collection $records) {
// return RefundManager::downloadRefunds($records, Excel::XLSX);
// }),
// BulkAction::make('csv-download')
// ->label('CSV herunterladen')
// ->icon('heroicon-o-download')
// ->action(function (Collection $records) {
// return RefundManager::downloadRefunds($records, Excel::CSV);
// }),
// BulkAction::make('anonymize')
// ->label('Anonymisieren')
// ->color('danger')
// ->icon('heroicon-o-user-remove')
// ->requiresConfirmation()
// ->modalHeading('Rückerstattungen anonymisieren')
// ->modalSubheading('Bist du dir sicher, dass du das tun willst? Die IBANs der Rückerstattungen werden gelöscht.')
// ->modalButton('IBANs löschen')
// ->action(function (Collection $records): void {
// $records->each(fn (Refund $record) => $record->anonymize());

// Notification::make()
// ->title("{$records->count()} Rückerstattungen anonymisiert")
// ->success()
// ->send();BulkAction::make('excel-download')
// ->label('Excel herunterladen')
// ->icon('heroicon-o-download')
// ->action(function (Collection $records) {
// return RefundManager::downloadRefunds($records, Excel::XLSX);
// }),
// BulkAction::make('csv-download')
// ->label('CSV herunterladen')
// ->icon('heroicon-o-download')
// ->action(function (Collection $records) {
// return RefundManager::downloadRefunds($records, Excel::CSV);
// }),
// BulkAction::make('anonymize')
// ->label('Anonymisieren')
// ->color('danger')
// ->icon('heroicon-o-user-remove')
// ->requiresConfirmation()
// ->modalHeading('Rückerstattungen anonymisieren')
// ->modalSubheading('Bist du dir sicher, dass du das tun willst? Die IBANs der Rückerstattungen werden gelöscht.')
// ->modalButton('IBANs löschen')
// ->action(function (Collection $records): void {
// ;

//  -->
