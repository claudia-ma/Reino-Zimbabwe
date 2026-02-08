<?php

namespace App\Filament\Admin\Resources\Cachorros\Pages;

use App\Filament\Admin\Resources\Cachorros\CachorroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCachorros extends ListRecords
{
    protected static string $resource = CachorroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
