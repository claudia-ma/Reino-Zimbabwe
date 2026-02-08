<?php

namespace App\Filament\Admin\Resources\CachorroImagens\Pages;

use App\Filament\Admin\Resources\CachorroImagens\CachorroImagenResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCachorroImagen extends EditRecord
{
    protected static string $resource = CachorroImagenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
