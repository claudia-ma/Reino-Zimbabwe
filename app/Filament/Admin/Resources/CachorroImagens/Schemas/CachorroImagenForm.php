<?php

namespace App\Filament\Admin\Resources\CachorroImagens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CachorroImagenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('cachorro_id')
                    ->required()
                    ->numeric(),
                TextInput::make('ruta')
                    ->required(),
                TextInput::make('orden')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
