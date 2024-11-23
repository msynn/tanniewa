<?php

namespace App\Filament\Resources\AplicationsResource\Pages;

use App\Models\aplications;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AplicationsResource;

class EditAplications extends EditRecord
{
    protected static string $resource = AplicationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(aplications $record)
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
