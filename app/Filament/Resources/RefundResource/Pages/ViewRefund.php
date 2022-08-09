<?php

namespace App\Filament\Resources\RefundResource\Pages;

use App\Facades\RefundManager;
use App\Filament\Resources\RefundResource;
use App\Models\Refund;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRefund extends ViewRecord
{
    protected static string $resource = RefundResource::class;


    protected function getActions(): array
    {
        $edit = Actions\EditAction::make()
            ->icon('heroicon-o-pencil');
        $delete = Actions\DeleteAction::make()
            ->icon('heroicon-o-trash');

        $anonymize = Actions\Action::make('anonymize')
            ->label('Anonymisieren')
            ->color('danger')
            ->icon('heroicon-o-user-remove')
            ->requiresConfirmation()
            ->modalHeading('Rückerstattung anonymisieren')
            ->modalSubheading('Bist du dir sicher, dass du das tun willst? Die IBAN der Rückerstattung wird gelöscht.')
            ->modalButton('IBAN löschen')
            ->action(function () {
                $this->record->anonymize();

                $this->data['name'] = $this->record->name;
                $this->data['iban'] = $this->record->iban;

                Notification::make()
                    ->title('Rückerstattung anonymisiert')
                    ->success()
                    ->send();
            });

        if (!$this->record->isExported() || $this->record->isAnonymized()) {
            return [
                $edit,
                $delete
            ];
        } else {
            return [
                $edit,
                $anonymize,
                $delete
            ];
        }
    }
}
