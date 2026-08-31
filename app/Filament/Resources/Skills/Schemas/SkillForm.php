<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Skill')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('category')
                    ->label('Kategori')
                    ->required()
                    ->options([
                        'Programming'  => 'Programming',
                        'Design'       => 'Design',
                        'Tools'        => 'Tools',
                        'Networking'   => 'Networking',
                        'Soft Skills'  => 'Soft Skills',
                    ]),
                TextInput::make('proficiency')
                    ->label('Kemahiran (0-100)')
                    ->numeric()
                    ->default(50)
                    ->minValue(0)
                    ->maxValue(100),
                TextInput::make('icon')
                    ->label('Icon (emoji)')
                    ->placeholder('contoh: 🐘 atau 💻')
                    ->maxLength(100)
                    ->helperText('Emoji yang akan ditampilkan sebagai icon'),
                FileUpload::make('image_path')
                    ->label('Gambar/Logo Skill (Opsional)')
                    ->image()
                    ->disk('public')
                    ->directory('skills')
                    ->maxSize(5120)
                    ->helperText('Ukuran maksimal 5MB. Jika diisi, gambar akan ditampilkan menggantikan icon emoji.')
                    ->imageEditor()
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
