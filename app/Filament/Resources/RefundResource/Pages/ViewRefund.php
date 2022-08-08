<?php

namespace App\Filament\Resources\RefundResource\Pages;

use App\Filament\Resources\RefundResource;
use App\Models\Refund;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRefund extends ViewRecord
{
    protected static string $resource = RefundResource::class;
    protected static string $anonymized_iban = 'DEXX XXXX XXXX XXXX XXXX XX';

    protected function getActions(): array
    {
        if ($this->record->export === null || $this->record->iban === static::$anonymized_iban) {
            return [
                Actions\EditAction::make(),
                Actions\DeleteAction::make()
            ];
        } else {
            return [
                Actions\Action::make('anonymize')
                    ->label('Anonymisieren')
                    ->requiresConfirmation()
                    ->action(function (): void {
                        $this->record->iban = static::$anonymized_iban;
                        $this->record->save();
                    }),
                Actions\EditAction::make(),
                Actions\DeleteAction::make()
            ];
        }
    }
}
