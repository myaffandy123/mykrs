<?php

namespace App\Filament\Resources\KRSResource\Pages;

use App\Filament\Resources\KRSResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKRS extends CreateRecord
{
    protected static string $resource = KRSResource::class;
    protected static ?string $title = 'Buat KRS';
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
