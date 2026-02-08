<?php

namespace App\Filament\Admin\Resources\Camadas\Pages;

use App\Filament\Admin\Resources\Camadas\CamadaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCamada extends EditRecord
{
    protected static string $resource = CamadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
