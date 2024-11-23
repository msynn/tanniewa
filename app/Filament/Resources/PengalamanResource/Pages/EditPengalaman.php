<?php

namespace App\Filament\Resources\PengalamanResource\Pages;

use App\Filament\Resources\PengalamanResource;
use App\Models\pengalaman;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPengalaman extends EditRecord
{
    protected static string $resource = PengalamanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(pengalaman $record)
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
