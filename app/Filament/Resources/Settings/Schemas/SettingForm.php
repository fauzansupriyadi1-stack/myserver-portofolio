<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Setting Name')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('key')
                    ->label('Setting Key')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('group')
                    ->label('Category Group')
                    ->disabled()
                    ->dehydrated(false),
                
                // Dynamic value inputs based on 'type' field
                TextInput::make('value')
                    ->label('Setting Value')
                    ->visible(fn ($record) => $record && in_array($record->type, ['text', 'url']) && $record->key !== 'site_logo'),
                
                Textarea::make('value')
                    ->label('Setting Value')
                    ->rows(4)
                    ->visible(fn ($record) => $record && $record->type === 'textarea'),
                
                FileUpload::make('value')
                    ->label('Logo Upload')
                    ->image()
                    ->disk('public')
                    ->directory('logo')
                    ->visible(fn ($record) => $record && $record->type === 'image'),
            ]);
    }
}
