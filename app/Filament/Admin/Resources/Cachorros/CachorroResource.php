<?php

namespace App\Filament\Admin\Resources\Cachorros;

use App\Filament\Admin\Resources\Cachorros\Pages\CreateCachorro;
use App\Filament\Admin\Resources\Cachorros\Pages\EditCachorro;
use App\Filament\Admin\Resources\Cachorros\Pages\ListCachorros;
use App\Filament\Admin\Resources\Cachorros\Pages\ViewCachorro;
use App\Filament\Admin\Resources\Cachorros\Relations\ImagenesRelationManager;
use App\Models\Cachorro;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;            // v4 usa Schema en lugar de Forms\Form
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;


class CachorroResource extends Resource
{
    protected static ?string $model = Cachorro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    /**
     * Formulario de creación/edición
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Datos del cachorro')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('camada_id')
                        ->label('Camada')
                        ->relationship('camada', 'nombre')
                        ->searchable()
                        ->required(),

                    Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('sexo')
                        ->label('Sexo')
                        ->options([
                            'm' => 'Macho',
                            'f' => 'Hembra',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('color')
                        ->label('Color')
                        ->maxLength(255),

                    Forms\Components\Select::make('estado')
                        ->label('Estado')
                        ->options([
                            'disponible' => 'Disponible',
                            'reservado'  => 'Reservado',
                            'entregado'  => 'Entregado',
                        ])
                        ->default('disponible')
                        ->required(),

                    Forms\Components\TextInput::make('video_url')
                        ->label('Video (YouTube/Vimeo)')
                        ->url()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('destacado')
                        ->label('Destacado')
                        ->default(false),
                ]),
        ]);
    }

    /**
     * Tabla de listado en el panel
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('camada.nombre')
                    ->label('Camada')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('sexo')
                    ->label('Sexo')
                    ->formatStateUsing(fn ($s) => strtoupper($s)),

                Tables\Columns\BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'success' => 'disponible',
                        'warning' => 'reservado',
                        'gray'    => 'entregado',
                    ]),

                Tables\Columns\IconColumn::make('destacado')
                    ->label('Destacado')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->since(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    /**
     * Relación: pestaña Imágenes dentro del cachorro
     */
    public static function getRelations(): array
    {
        return [
            ImagenesRelationManager::class,
        ];
    }

    /**
     * Páginas del recurso
     */
    public static function getPages(): array
    {
        return [
            'index'  => ListCachorros::route('/'),
            'create' => CreateCachorro::route('/create'),
            'view'   => ViewCachorro::route('/{record}'),
            'edit'   => EditCachorro::route('/{record}/edit'),
        ];
    }
}