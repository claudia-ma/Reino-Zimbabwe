<?php

namespace App\Filament\Admin\Resources\Cachorros\Pages;

use App\Filament\Admin\Resources\Cachorros\CachorroResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCachorro extends EditRecord
{
    protected static string $resource = CachorroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
