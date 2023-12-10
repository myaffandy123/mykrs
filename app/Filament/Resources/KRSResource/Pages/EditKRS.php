<?php

namespace App\Filament\Resources\KRSResource\Pages;

use App\Filament\Resources\KRSResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKRS extends EditRecord
{
    protected static string $resource = KRSResource::class;
    protected static ?string $title = 'Edit KRS';
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus KRS'),
        ];
    }
}
