<?php

namespace App\Filament\Admin\Resources\Consultas;

use App\Filament\Admin\Resources\Consultas\Pages\CreateConsulta;
use App\Filament\Admin\Resources\Consultas\Pages\EditConsulta;
use App\Filament\Admin\Resources\Consultas\Pages\ListConsultas;
use App\Filament\Admin\Resources\Consultas\Pages\ViewConsulta;
use App\Filament\Admin\Resources\Consultas\Schemas\ConsultaForm;
use App\Filament\Admin\Resources\Consultas\Schemas\ConsultaInfolist;
use App\Filament\Admin\Resources\Consultas\Tables\ConsultasTable;
use App\Models\Consulta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConsultaResource extends Resource
{
    protected static ?string $model = Consulta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return ConsultaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsultaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsultasTable::configure($table);
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
            'index' => ListConsultas::route('/'),
            'create' => CreateConsulta::route('/create'),
            'view' => ViewConsulta::route('/{record}'),
            'edit' => EditConsulta::route('/{record}/edit'),
        ];
    }
}
