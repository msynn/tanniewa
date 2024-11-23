<?php

namespace App\Filament\Resources\KarirResource\Pages;

use App\Filament\Resources\KarirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKarir extends EditRecord
{
    protected static string $resource = KarirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
