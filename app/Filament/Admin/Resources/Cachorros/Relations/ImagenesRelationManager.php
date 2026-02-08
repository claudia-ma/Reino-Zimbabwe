<?php

namespace App\Filament\Admin\Resources\Cachorros\Relations;

use App\Models\CachorroImagen;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ImagenesRelationManager extends RelationManager
{
    protected static string $relationship = 'imagenes'; // nombre de la relación en el modelo Cachorro

    protected static ?string $title = 'Imágenes';

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->schema([
            Forms\Components\FileUpload::make('ruta')
                ->label('Archivo')
                ->image()
                ->directory('cachorros')
                ->required()
                ->maxSize(2048),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('ruta')
                    ->label('Vista previa')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Subida')
                    ->since(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}