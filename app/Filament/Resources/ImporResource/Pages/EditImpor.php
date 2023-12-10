<?php

namespace App\Filament\Resources\ImporResource\Pages;

use App\Filament\Resources\ImporResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImpor extends EditRecord
{
    protected static string $resource = ImporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
