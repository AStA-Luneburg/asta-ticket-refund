<?php

namespace App\Filament\Resources;

use App\Exports\RefundsExcelExport;
use App\Filament\Resources\RefundResource\Pages;
use App\Models\Refund;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

use App\Rules\IBAN;
use Filament\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Excel;

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
                    ->disabled(fn (Page $livewire) => $livewire instanceof EditRecord)
                    ->searchable()
                    ->required(),
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
                Filter::make('not_exported')
                    ->label('Nicht exportiert')
                    ->query(fn (Builder $query): Builder => $query->where('export_id', null))
                    ->toggle(),
                SelectFilter::make('export')
                    ->label('Datenexport')
                    ->relationship('export', 'id')
                    // ->searchable()
            ])
            ->actions([])
            ->bulkActions([
                BulkAction::make('excel-download')
                    ->label('Excel herunterladen')
                    ->color('primary')
                    ->action(function (Collection $records) {
                        $date = now()->format('Y-m-d_H-m-s');

                        return RefundsExcelExport::withCollection($records)
                            ->download("Refunds_{$date}.xlsx", Excel::XLSX);
                    }),
                BulkAction::make('csv-download')
                    ->label('CSV herunterladen')
                    ->color('primary')
                    ->action(function (Collection $records) {
                        $date = now()->format('Y-m-d');

                        return RefundsExcelExport::withCollection($records)
                            ->download("Refunds_{$date}.csv", Excel::CSV);
                    })
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\UserRelationManager::class,
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

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return false;
    }

    protected function downloadSelected(Collection $refunds, string $type)
    {
        $extension = strtolower($type);

        return ;
    }
}
