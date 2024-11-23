<?php

namespace App\Filament\Resources\WebsiteResource\Pages;

use App\Filament\Resources\WebsiteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsite extends CreateRecord
{
    protected static string $resource = WebsiteResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
