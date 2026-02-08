<?php

namespace App\Filament\Admin\Resources\CachorroImagens;

use App\Filament\Admin\Resources\CachorroImagens\Pages\CreateCachorroImagen;
use App\Filament\Admin\Resources\CachorroImagens\Pages\EditCachorroImagen;
use App\Filament\Admin\Resources\CachorroImagens\Pages\ListCachorroImagens;
use App\Filament\Admin\Resources\CachorroImagens\Pages\ViewCachorroImagen;
use App\Filament\Admin\Resources\CachorroImagens\Schemas\CachorroImagenForm;
use App\Filament\Admin\Resources\CachorroImagens\Schemas\CachorroImagenInfolist;
use App\Filament\Admin\Resources\CachorroImagens\Tables\CachorroImagensTable;
use App\Models\CachorroImagen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CachorroImagenResource extends Resource
{
    protected static ?string $model = CachorroImagen::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ruta';

    public static function form(Schema $schema): Schema
    {
        return CachorroImagenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CachorroImagenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CachorroImagensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCachorroImagens::route('/'),
            'create' => CreateCachorroImagen::route('/create'),
            'view' => ViewCachorroImagen::route('/{record}'),
            'edit' => EditCachorroImagen::route('/{record}/edit'),
        ];
    }
}
