<?php

namespace App\Filament\Admin\Resources\Camadas\Pages;

use App\Filament\Admin\Resources\Camadas\CamadaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCamada extends ViewRecord
{
    protected static string $resource = CamadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
