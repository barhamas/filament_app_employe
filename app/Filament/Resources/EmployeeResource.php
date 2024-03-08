<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\Pointage;
use App\Models\Paiment;


class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('Cni'),
                TextInput::make('Prenom'),
                TextInput::make('email'),
                TextInput::make('qrcode'),
                TextInput::make('horaire'),
                TextInput::make('salaire'),
                TextInput::make('cjm'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')->sortable()->searchable(),
                TextColumn::make('prenom')->sortable()->searchable(),
                TextColumn::make('Cni')->sortable()->searchable(),
                TextColumn::make('salaire')->sortable()->searchable(),
                TextColumn::make('Telephone')->sortable()->searchable(),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
                    ->iconColor('primary'),
                TextColumn::make('Pointages')->value(function (Employee $employee) {
                    return $employee->pointages->count();
                }),
                TextColumn::make('Paiements')->value(function (Employee $employee) {
                    return $employee->paiements->count();
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            'pointages' => Pointage::class,
            'paiements' => Paiment::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
