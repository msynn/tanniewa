<?php

namespace App\Filament\Resources\AplicationsResource\Pages;

use App\Filament\Resources\AplicationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAplications extends CreateRecord
{
    protected static string $resource = AplicationsResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
