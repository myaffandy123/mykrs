<?php

namespace App\Filament\Resources\ImporResource\Pages;

use Filament\Actions;
use App\Filament\Resources\ImporResource;
use Filament\Resources\Pages\CreateRecord;

class CreateImpor extends CreateRecord
{
    protected static string $resource = ImporResource::class;
    protected static ?string $title = 'Impor Daftar Mata Kuliah';

    protected function getActions(): array
    {
        return [
            //  Actions\CreateAction::make(),
        ];
    }

    protected function getFormActions(): array {
        return [
            Actions\CreateAction::make()
                ->label('Upload')
                ->requiresConfirmation()
        ];
    }

}
