<?php

namespace App\Filament\Resources\VisualisasiResource\Pages;

use App\Filament\Resources\VisualisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisualisasis extends ListRecords
{
    protected static string $resource = VisualisasiResource::class;
    protected static ?string $title = 'Visualisasi';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

}
