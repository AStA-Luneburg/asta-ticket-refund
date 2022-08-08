<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Refund;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefundRelationManager extends RelationManager
{
    protected static string $relationship = 'refund';
    protected static ?string $modelLabel = 'Student*in';
    protected static ?string $pluralModelLabel = 'Studierende*r';

    protected static ?string $recordTitleAttribute = 'matriculation_number';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Kontoinhaber*in'),
                Tables\Columns\TextColumn::make('iban')->label('IBAN'),
                Tables\Columns\BadgeColumn::make('export.name')
                    ->label('Datenexport')
                    ->default('Nicht exportiert')
                    ->colors([
                        'success',
                        'primary' => 'Nicht exportiert'
                    ])
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn ($record): string => '/admin/refunds/' . $record->id),
            ])
            ->bulkActions([]);
    }
}
