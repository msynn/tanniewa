<?php

namespace App\Filament\Resources\AboutsResource\Pages;

use App\Filament\Resources\AboutsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutsResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
