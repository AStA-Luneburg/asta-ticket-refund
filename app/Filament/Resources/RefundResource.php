<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Page;
use App\Filament\Resources\RefundResource\Pages;
use App\Filament\Resources\RefundResource\RelationManagers\ExportRelationManager;
use App\Filament\Actions\Tables\AnonymizeBulk;
use App\Filament\Actions\Tables\DownloadCSVBulk;
use App\Filament\Actions\Tables\DownloadExcelBulk;
use App\Models\Refund;
use App\Models\User;
use App\Rules\IBAN;

class RefundResource extends Resource
{
    protected static ?string $model = Refund::class;
    protected static ?string $recordTitleAttribute = 'meta_name';
    protected static ?string $modelLabel = 'Rückerstattung';
    protected static ?string $pluralModelLabel = 'Rückerstattungen';

    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('matriculation_number')
                    ->label('Studierende*r')
                    ->relationship('user', 'name_with_matriculation')
                    ->placeholder('Name oder Matrikelnummer')
                    ->unique(ignoreRecord: true)
                    ->disabled(fn (Page $livewire) => !($livewire instanceof CreateRecord))
                    ->searchable()
                    ->required(),
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Erstellt am')
                    ->hiddenOn('create')
                    ->disabled(true),
                Forms\Components\TextInput::make('export_id')
                    ->label('Datenexport')
                    ->placeholder('Nicht exportiert')
                    ->visibleOn(['edit', 'view'])
                    ->disabled(true),
                Forms\Components\Fieldset::make('Kontodaten')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Kontoinhaber*in')
                            ->placeholder('Name')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('iban')
                            ->label('IBAN')
                            ->placeholder('IBAN')
                            ->rules([new IBAN])
                            ->required(),
                    ]),
            ]);
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
                SelectFilter::make('export')
                    ->label('Datenexport')
                    ->relationship('export', 'id'),
                Filter::make('not_exported')
                    ->label('Nicht exportiert')
                    ->query(fn (Builder $query): Builder => $query->where('export_id', null))
                    ->toggle()
                // ->searchable()
            ])
            ->actions([])
            ->bulkActions([
                DownloadExcelBulk::make(),
                DownloadCSVBulk::make(),
                AnonymizeBulk::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ExportRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRefunds::route('/'),
            'create' => Pages\CreateRefund::route('/create'),
            'view' => Pages\ViewRefund::route('/{record}'),
            'edit' => Pages\EditRefund::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'iban', 'user.name', 'user.email', 'matriculation_number'];
    }
}
