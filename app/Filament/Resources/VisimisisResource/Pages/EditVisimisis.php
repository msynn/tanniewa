<?php

namespace App\Filament\Resources\VisimisisResource\Pages;

use App\Filament\Resources\VisimisisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisimisis extends EditRecord
{
    protected static string $resource = VisimisisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
