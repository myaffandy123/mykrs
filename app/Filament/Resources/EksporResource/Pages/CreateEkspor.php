<?php

namespace App\Filament\Resources\EksporResource\Pages;

use App\Filament\Resources\EksporResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEkspor extends CreateRecord
{
    protected static string $resource = EksporResource::class;
    protected static ?string $title = 'Ekspor Daftar Mata Kuliah';

    protected function getFormActions(): array {
        return [
            Actions\Action::make('ekspor')
                ->label('Ekspor')
                ->requiresConfirmation()
                ->modalButton('Ekspor')
                ->modalCancelActionLabel('Batal')
                ->modalHeading('Ekspor Daftar Mata Kuliah?')
                ->modalDescription('File akan disimpan dalam jenis .txt')
        ];
    }
}
