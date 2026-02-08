<?php

namespace App\Filament\Admin\Resources\Consultas\Pages;

use App\Filament\Admin\Resources\Consultas\ConsultaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsulta extends ViewRecord
{
    protected static string $resource = ConsultaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
