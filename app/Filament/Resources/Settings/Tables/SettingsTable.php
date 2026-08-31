<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('Setting Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('key')
                    ->label('Key')
                    ->fontFamily('mono')
                    ->searchable(),
                TextColumn::make('value')
                    ->label('Value')
                    ->limit(60)
                    ->searchable(),
                TextColumn::make('group')
                    ->label('Category')
                    ->badge()
                    ->color('info')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
