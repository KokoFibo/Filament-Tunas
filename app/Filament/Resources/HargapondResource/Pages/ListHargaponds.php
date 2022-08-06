<?php

namespace App\Filament\Resources\HargapondResource\Pages;

use App\Filament\Resources\HargapondResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHargaponds extends ListRecords
{
    protected static string $resource = HargapondResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
