<?php

namespace App\Filament\Resources\RefundResource\Pages;

use App\Filament\Resources\RefundResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefund extends EditRecord
{
    protected static string $resource = RefundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->icon('heroicon-o-eye'),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
}
