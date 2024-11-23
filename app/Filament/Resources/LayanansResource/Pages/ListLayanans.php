<?php

namespace App\Filament\Resources\LayanansResource\Pages;

use App\Filament\Resources\LayanansResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLayanans extends ListRecords
{
    protected static string $resource = LayanansResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
