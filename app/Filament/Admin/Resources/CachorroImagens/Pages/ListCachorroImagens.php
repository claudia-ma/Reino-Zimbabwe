<?php

namespace App\Filament\Admin\Resources\CachorroImagens\Pages;

use App\Filament\Admin\Resources\CachorroImagens\CachorroImagenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCachorroImagens extends ListRecords
{
    protected static string $resource = CachorroImagenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
