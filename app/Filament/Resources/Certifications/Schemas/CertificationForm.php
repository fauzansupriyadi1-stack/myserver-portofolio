<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Sertifikasi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('issuing_organization')
                    ->label('Penerbit')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('issue_date')
                    ->label('Tanggal Terbit')
                    ->required(),
                DatePicker::make('expiry_date')
                    ->label('Tanggal Kadaluarsa')
                    ->nullable(),
                TextInput::make('credential_id')
                    ->label('ID Kredensial')
                    ->maxLength(255)
                    ->nullable(),
                TextInput::make('credential_url')
                    ->label('URL Verifikasi')
                    ->url()
                    ->maxLength(500)
                    ->nullable()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),
                FileUpload::make('logo')
                    ->label('Foto / Logo Sertifikasi')
                    ->image()
                    ->directory('certifications')
                    ->maxSize(5120)
                    ->helperText('Upload logo atau thumbnail penerbit. Maks 5MB.')
                    ->imageEditor()
                    ->nullable()
                    ->columnSpanFull(),
                FileUpload::make('certificate_image')
                    ->label('📄 Foto Sertifikat Asli')
                    ->image()
                    ->directory('certifications/photos')
                    ->maxSize(10240)
                    ->helperText('Upload foto/scan sertifikat asli Anda. Tombol "Lihat Sertifikat" akan menampilkan gambar ini. Maks 10MB.')
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
