<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Utama')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),
                
                TextInput::make('badge_text')
                    ->label('Badge Text'),
                
                TextInput::make('primary_cta_text')
                    ->label('Primary Button Text'),
                
                TextInput::make('primary_cta_url')
                    ->label('Primary Button URL'),
                
                TextInput::make('secondary_cta_text')
                    ->label('Secondary Button Text'),
                
                TextInput::make('secondary_cta_url')
                    ->label('Secondary Button URL'),
                
                FileUpload::make('background_image')
                    ->label('Hero Photo/Image')
                    ->image()
                    ->disk('public')
                    ->directory('hero')
                    ->columnSpanFull(),
                
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}

