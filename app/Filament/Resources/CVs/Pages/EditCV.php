<?php

namespace App\Filament\Resources\CVs\Pages;

use App\Filament\Resources\CVs\CVResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCV extends EditRecord
{
    protected static string $resource = CVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
