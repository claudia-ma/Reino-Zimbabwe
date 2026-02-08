<?php

namespace App\Filament\Admin\Resources\Cachorros\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CachorroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('camada_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nombre')
                    ->required(),
                Select::make('sexo')
                    ->options(['m' => 'M', 'f' => 'F'])
                    ->required(),
                TextInput::make('color'),
                Select::make('estado')
                    ->options(['disponible' => 'Disponible', 'reservado' => 'Reservado', 'entregado' => 'Entregado'])
                    ->default('disponible')
                    ->required(),
                TextInput::make('video_url')
                    ->url(),
                Toggle::make('destacado')
                    ->required(),
            ]);
    }
}
