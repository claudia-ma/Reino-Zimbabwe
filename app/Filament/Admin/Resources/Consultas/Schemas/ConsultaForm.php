<?php

namespace App\Filament\Admin\Resources\Consultas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ConsultaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('telefono')
                    ->tel(),
                Textarea::make('mensaje')
                    ->columnSpanFull(),
                Select::make('origen')
                    ->options(['web' => 'Web', 'instagram' => 'Instagram', 'whatsapp' => 'Whatsapp', 'email' => 'Email'])
                    ->default('web')
                    ->required(),
                TextInput::make('camada_id')
                    ->numeric(),
                TextInput::make('cachorro_id')
                    ->numeric(),
                Select::make('estado')
                    ->options(['nueva' => 'Nueva', 'en_curso' => 'En curso', 'cerrada' => 'Cerrada'])
                    ->default('nueva')
                    ->required(),
            ]);
    }
}
