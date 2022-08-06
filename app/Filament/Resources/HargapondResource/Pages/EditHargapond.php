<?php

namespace App\Filament\Resources\HargapondResource\Pages;

use App\Filament\Resources\HargapondResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHargapond extends EditRecord
{
    protected static string $resource = HargapondResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
