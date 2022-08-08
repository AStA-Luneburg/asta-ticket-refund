<?php

namespace App\Filament\Resources\ExportResource\RelationManagers;

use App\Models\Refund;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefundsRelationManager extends RelationManager
{
    protected static string $relationship = 'refunds';
    protected static ?string $modelLabel = 'Rückerstattung';
    protected static ?string $pluralModelLabel = 'Rückerstattungen';
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
                Tables\Columns\TextColumn::make('user')
                    ->label('Studierende*r')
                    ->formatStateUsing(fn (User $state): string => $state->name)
                    ->description(fn (Refund $record): string => "Matrikelnummer: {$record->user->matriculation_number}")
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('matriculation_number', 'like', "%{$search}%");
                    }),
                Tables\Columns\TextColumn::make('name')->label('Kontoinhaber*in'),
                Tables\Columns\TextColumn::make('iban')->label('IBAN')->extraAttributes(['class' => 'font-mono text-sm'])
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make()->url(fn ($record): string => '/admin/refunds/' . $record->id),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }
}
