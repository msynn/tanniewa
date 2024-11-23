<?php

namespace App\Filament\Resources\AboutsResource\Pages;

use App\Filament\Resources\AboutsResource;
use App\Models\abouts;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditAbouts extends EditRecord
{
    protected static string $resource = AboutsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(abouts $record)
                {
                    if ($record->image) {
                        Storage::disk('public')->delete($record->image);
                    }
                }
            ),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
