<?php

namespace App\Filament\Resources\EksporResource\Pages;

use App\Filament\Resources\EksporResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEkspors extends ListRecords
{
    protected static string $resource = EksporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
