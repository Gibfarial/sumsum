<?php

namespace App\Filament\Resources\Sheet2Resource\Pages;

use App\Filament\Resources\Sheet2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSheet2 extends EditRecord
{
    protected static string $resource = Sheet2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
