<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExportResource\Pages;
use App\Filament\Resources\ExportResource\RelationManagers;
use App\Filament\Resources\ExportResource\RelationManagers\RefundsRelationManager;
use App\Models\Export;
use App\Models\Refund;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExportResource extends Resource
{
    protected static ?string $model = Export::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Datenexport';
    protected static ?string $pluralModelLabel = 'Datenexports';

    protected static ?string $navigationIcon = 'heroicon-o-cloud-download';

    public static function form(Form $form): Form
    {
        $count = Refund::where('export_id', null)->count();

        return $form
            ->schema([
                Forms\Components\TextInput::make('count')
                    ->label('Anzahl an Anträgen')
                    ->default($count)
                    ->visibleOn('create')
                    ->dehydrated(true)
                    ->disabled(),
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Erstellt am')
                    ->default('2022-01-01 00:00:00')
                    ->visibleOn('view')
                    ->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->description('Datenexport-ID'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Erstellt am')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('refunds_count')
                    ->label('Anzahl an Anträgen')
                    ->counts('refunds')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RefundsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExports::route('/'),
            'create' => Pages\CreateExport::route('/create'),
            'view' => Pages\ViewExport::route('/{record}'),
        ];
    }
}