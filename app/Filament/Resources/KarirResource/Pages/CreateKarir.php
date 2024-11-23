<?php

namespace App\Filament\Resources\KarirResource\Pages;

use App\Filament\Resources\KarirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKarir extends CreateRecord
{
    protected static string $resource = KarirResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
