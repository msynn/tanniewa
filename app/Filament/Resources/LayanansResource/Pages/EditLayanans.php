<?php

namespace App\Filament\Resources\LayanansResource\Pages;

use App\Filament\Resources\LayanansResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayanans extends EditRecord
{
    protected static string $resource = LayanansResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
