<?php

namespace App\Filament\Resources\MataKuliahResource\Pages;

use App\Filament\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMataKuliah extends EditRecord
{
    protected static string $resource = MataKuliahResource::class;
    protected static ?string $title = 'Edit Mata Kuliah';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Mata Kuliah'),
        ];
    }
}
