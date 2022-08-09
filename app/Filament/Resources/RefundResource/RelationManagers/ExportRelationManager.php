<?php

namespace App\Filament\Resources\RefundResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use App\Filament\Resources\ExportResource;
use App\Models\Export;

class ExportRelationManager extends RelationManager
{
    protected static string $relationship = 'export';
    protected static ?string $modelLabel = 'Datenexport';
    protected static ?string $pluralModelLabel = 'Datenexporte';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Erstellt am')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('refunds_count')
                    ->label('Anzahl an Anträgen')
                    ->counts('refunds')
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn (Export $record): string => ExportResource::getUrl('view', ['record' => $record])),
            ]);
    }
}
