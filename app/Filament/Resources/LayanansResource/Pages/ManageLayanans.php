<?php

namespace App\Filament\Resources\LayanansResource\Pages;

use App\Filament\Resources\LayanansResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLayanans extends ManageRecords
{
    protected static string $resource = LayanansResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
