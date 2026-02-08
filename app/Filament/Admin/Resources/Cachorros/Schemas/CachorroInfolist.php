<?php

namespace App\Filament\Admin\Resources\Cachorros\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CachorroInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('camada_id')
                    ->numeric(),
                TextEntry::make('nombre'),
                TextEntry::make('sexo')
                    ->badge(),
                TextEntry::make('color')
                    ->placeholder('-'),
                TextEntry::make('estado')
                    ->badge(),
                TextEntry::make('video_url')
                    ->placeholder('-'),
                IconEntry::make('destacado')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
