<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturansResource\Pages;
use App\Filament\Resources\PengaturansResource\RelationManagers;
use App\Models\Pengaturans;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaturansResource extends Resource
{
    protected static ?string $model = Pengaturans::class;
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getNavigationLabel(): string
{
    return 'Pengaturan';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('value')->limit('40'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function(Pengaturans $record){
                    switch($record->type){
                        case 'text':
                            return [Forms\Components\TextInput::make('value')->label($record->label)];
                            break;
                        case 'longtext':
                            return [Forms\Components\RichEditor::make('value')->label($record->label)];
                            break;
                    }
                }),

            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePengaturans::route('/'),
        ];
    }
}
