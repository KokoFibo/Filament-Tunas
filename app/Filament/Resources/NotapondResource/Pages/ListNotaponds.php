<?php

namespace App\Filament\Resources\NotapondResource\Pages;

use App\Filament\Resources\NotapondResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNotaponds extends ListRecords
{
    protected static string $resource = NotapondResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
