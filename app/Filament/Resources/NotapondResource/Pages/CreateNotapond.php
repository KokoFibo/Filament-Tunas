<?php

namespace App\Filament\Resources\NotapondResource\Pages;

use App\Filament\Resources\NotapondResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNotapond extends CreateRecord
{
    protected static string $resource = NotapondResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
