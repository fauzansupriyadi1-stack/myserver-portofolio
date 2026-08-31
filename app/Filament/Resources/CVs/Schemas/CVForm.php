<?php

namespace App\Filament\Resources\CVs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CVForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama CV')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('CV Fauzan - 2026')
                    ->helperText('Nama untuk identifikasi CV di dashboard')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->placeholder('Contoh: CV terbaru dengan pengalaman terkini')
                    ->helperText('Deskripsi singkat tentang CV ini (opsional)')
                    ->nullable()
                    ->columnSpanFull(),

                FileUpload::make('file_path')
                    ->label('Upload CV (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->directory('cvs')
                    ->maxSize(10240)
                    ->helperText('Format: PDF. Ukuran maksimal 10MB.')
                    ->nullable()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->helperText('CV aktif akan ditampilkan di halaman portfolio'),
            ]);
    }
}
