<?php

namespace App\Filament\Resources\PesananResource\Pages;

use App\Filament\Resources\PesananResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ViewPesanans extends ViewRecord
{
    protected static string $resource = PesananResource::class;

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('nama')
                ->label('Nama')
                ->disabled(),

            TextInput::make('email')
                ->label('Email')
                ->disabled(),

            TextInput::make('phone')
                ->label('Nomor Telepon')
                ->disabled(),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->disabled(),

            TextInput::make('status')
                ->label('Status')
                ->disabled(),
        ];
    }
}
