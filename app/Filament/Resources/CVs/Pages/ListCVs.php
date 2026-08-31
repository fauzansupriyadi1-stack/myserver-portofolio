<?php

namespace App\Filament\Resources\CVs\Pages;

use App\Filament\Resources\CVs\CVResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCVs extends ListRecords
{
    protected static string $resource = CVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
