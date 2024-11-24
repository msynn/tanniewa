<?php

namespace App\Filament\Resources\ProyekResource\Pages;

use App\Filament\Resources\ProyekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProyek extends CreateRecord
{
    protected static string $resource = ProyekResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
