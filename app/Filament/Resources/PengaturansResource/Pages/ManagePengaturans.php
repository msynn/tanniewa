<?php

namespace App\Filament\Resources\PengaturansResource\Pages;

use App\Filament\Resources\PengaturansResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePengaturans extends ManageRecords
{
    protected static string $resource = PengaturansResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
