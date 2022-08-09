<?php

namespace App\Filament\Actions\Tables;

use Illuminate\Database\Eloquent\Collection;
use Filament\Notifications\Notification;
use Filament\Support\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\BulkAction;
use App\Models\Refund;

class AnonymizeBulk extends BulkAction
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'anonymize';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Anonymisieren');
        $this->color('danger');
        $this->icon('heroicon-o-user-remove');
        $this->requiresConfirmation();
        $this->modalHeading('Rückerstattungen anonymisieren');
        $this->modalSubheading('Bist du dir sicher, dass du das tun willst? Die IBANs der Rückerstattungen werden gelöscht.');
        $this->modalButton('IBANs löschen');

        $this->action(function (): void {
            $this->process(static function (Collection $records) {
                $records->each(fn (Refund $record) => $record->anonymize());

                Notification::make()
                    ->title("{$records->count()} Rückerstattungen anonymisiert")
                    ->success()
                    ->send();
            });

            $this->success();
        });
    }
}
