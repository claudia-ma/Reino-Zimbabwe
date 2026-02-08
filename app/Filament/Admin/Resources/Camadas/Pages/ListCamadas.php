<?php

namespace App\Filament\Admin\Resources\Camadas\Pages;

use App\Filament\Admin\Resources\Camadas\CamadaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCamadas extends ListRecords
{
    protected static string $resource = CamadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
