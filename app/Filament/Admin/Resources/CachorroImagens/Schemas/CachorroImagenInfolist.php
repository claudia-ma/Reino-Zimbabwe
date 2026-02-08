<?php

namespace App\Filament\Admin\Resources\CachorroImagens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CachorroImagenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cachorro_id')
                    ->numeric(),
                TextEntry::make('ruta'),
                TextEntry::make('orden')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
