<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Project')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('E-Commerce Platform')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->placeholder('Full-featured online store with inventory management and payment gateway integration.')
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('technologies')
                    ->label('Teknologi')
                    ->placeholder('Laravel • MySQL • Stripe')
                    ->helperText('Pisahkan dengan bullet (•) atau koma')
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('url')
                    ->label('Project URL (Opsional)')
                    ->url()
                    ->placeholder('https://example.com')
                    ->maxLength(255)
                    ->helperText('Link ke demo project atau repository (boleh kosong)')
                    ->nullable()
                    ->columnSpanFull(),

                FileUpload::make('image_path')
                    ->label('Gambar Project')
                    ->image()
                    ->directory('projects')
                    ->maxSize(5120)
                    ->helperText('Ukuran maksimal 5MB. Format: JPG, PNG, WebP')
                    ->imageEditor()
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->helperText('Semakin kecil angka, semakin awal ditampilkan'),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->helperText('Hanya project aktif yang akan ditampilkan di halaman depan'),
            ]);
    }
}
