<?php

namespace App\Filament\Resources\CVs;

use App\Filament\Resources\CVs\Pages;
use App\Filament\Resources\CVs\Schemas\CVForm;
use App\Filament\Resources\CVs\Tables\CVsTable;
use App\Models\CV;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CVResource extends Resource
{
    protected static ?string $model = CV::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static \UnitEnum|string|null $navigationGroup = 'Portfolio';
    protected static ?int $navigationSort = 7;
    protected static ?string $label = 'CV';
    protected static ?string $pluralLabel = 'CV';

    public static function form(Schema $schema): Schema
    {
        return CVForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CVsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCVs::route('/'),
            'create' => Pages\CreateCV::route('/create'),
            'edit' => Pages\EditCV::route('/{record}/edit'),
        ];
    }
}
