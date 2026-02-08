<?php

namespace App\Filament\Admin\Resources\CachorroImagens\Pages;

use App\Filament\Admin\Resources\CachorroImagens\CachorroImagenResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCachorroImagen extends ViewRecord
{
    protected static string $resource = CachorroImagenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
