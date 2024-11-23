<?php

namespace App\Filament\Resources\TeamsResource\Pages;

use App\Filament\Resources\TeamsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeams extends CreateRecord
{
    protected static string $resource = TeamsResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
