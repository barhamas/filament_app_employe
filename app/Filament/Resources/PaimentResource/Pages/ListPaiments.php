<?php

namespace App\Filament\Resources\PaimentResource\Pages;

use App\Filament\Resources\PaimentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaiments extends ListRecords
{
    protected static string $resource = PaimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
