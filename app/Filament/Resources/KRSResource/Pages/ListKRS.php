<?php

namespace App\Filament\Resources\KRSResource\Pages;

use App\Filament\Resources\KRSResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKRS extends ListRecords
{
    protected static string $resource = KRSResource::class;

    protected static ?string $title = 'Daftar KRS';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('KRS Baru'),
        ];
    }
}
