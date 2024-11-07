<?php

namespace App\Filament\Resources\Sheet1Resource\Pages;

use App\Filament\Resources\Sheet1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSheet1 extends EditRecord
{
    protected static string $resource = Sheet1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
