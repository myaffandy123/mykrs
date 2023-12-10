<?php

namespace App\Filament\Resources\EksporResource\Pages;

use App\Filament\Resources\EksporResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEkspor extends EditRecord
{
    protected static string $resource = EksporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
