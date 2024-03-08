<?php

namespace App\Filament\Resources\PaimentResource\Pages;

use App\Filament\Resources\PaimentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaiment extends EditRecord
{
    protected static string $resource = PaimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
