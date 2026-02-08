<?php

namespace App\Filament\Admin\Resources\Camadas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CamadaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('padre')
                    ->required(),
                TextInput::make('madre')
                    ->required(),
                DatePicker::make('fecha_nacimiento')
                    ->required(),
                Textarea::make('descripcion')
                    ->columnSpanFull(),
                Toggle::make('activa')
                    ->required(),
            ]);
    }
}
