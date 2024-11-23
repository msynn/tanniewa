<?php

namespace App\Filament\Resources\AplicationsResource\Pages;

use App\Filament\Resources\AplicationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAplications extends ListRecords
{
    protected static string $resource = AplicationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
