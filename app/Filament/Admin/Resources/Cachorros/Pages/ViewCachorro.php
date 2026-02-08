<?php

namespace App\Filament\Admin\Resources\Cachorros\Pages;

use App\Filament\Admin\Resources\Cachorros\CachorroResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCachorro extends ViewRecord
{
    protected static string $resource = CachorroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
