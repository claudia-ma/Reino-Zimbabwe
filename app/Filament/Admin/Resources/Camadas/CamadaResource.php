<?php

namespace App\Filament\Admin\Resources\Camadas;

use App\Filament\Admin\Resources\Camadas\Pages\CreateCamada;
use App\Filament\Admin\Resources\Camadas\Pages\EditCamada;
use App\Filament\Admin\Resources\Camadas\Pages\ListCamadas;
use App\Filament\Admin\Resources\Camadas\Pages\ViewCamada;
use App\Models\Camada;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; // ⬅️ v4 usa Schema
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;



class CamadaResource extends Resource
{
    protected static ?string $model = Camada::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    /**
     * Formulario (v4: Schema)
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Datos de la camada')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nombre')
                        ->label('Nombre')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('fecha_nacimiento')
                        ->label('Fecha de nacimiento')
                        ->native(false),

                    Forms\Components\TextInput::make('padre')
                        ->label('Padre')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('madre')
                        ->label('Madre')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('descripcion')
                        ->label('Descripción')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('activa')
                        ->label('Activa')
                        ->default(true),
                ]),
        ]);
    }

    /**
     * Tabla
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Camada')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->label('Nacimiento')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('activa')
                    ->label('Activa')
                    ->boolean(),

                Tables\Columns\TextColumn::make('cachorros_count')
                    ->counts('cachorros')
                    ->label('Cachorros'),

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

    public static function getRelations(): array
    {
        return [
            // (si luego añades relation managers, van aquí)
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListCamadas::route('/'),
            'create' => CreateCamada::route('/create'),
            'view'   => ViewCamada::route('/{record}'),
            'edit'   => EditCamada::route('/{record}/edit'),
        ];
    }
}