<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaimentResource\Pages;
use App\Models\Paiment;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaimentResource extends Resource
{
    protected static ?string $model = Paiment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form|Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('user_id'),
                TextInput::make('montant'),
                TextInput::make('mois'),
                TextInput::make('annee'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')->sortable()->searchable(),
                TextColumn::make('montant')->sortable()->searchable(),
                TextColumn::make('mois')->sortable()->searchable(),
                TextColumn::make('annee')->sortable()->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaiments::route('/'),
            'create' => Pages\CreatePaiment::route('/create'),
            'edit' => Pages\EditPaiment::route('/{record}/edit'),
        ];
    }
}
