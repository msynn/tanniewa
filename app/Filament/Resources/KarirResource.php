<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KarirResource\Pages;
use App\Filament\Resources\KarirResource\RelationManagers;
use App\Models\Karir;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KarirResource extends Resource
{
    protected static ?string $model = Karir::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\TextInput::make('job')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('keterangan')
                        ->required(),
                    Forms\Components\TextInput::make('jenis')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('gaji')
                    ->prefix('Rp') // Opsional: menambahkan prefix "Rp" untuk rupiah
                    ->required(),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job'),
                Tables\Columns\TextColumn::make('keterangan')->limit('30'),
                Tables\Columns\TextColumn::make('jenis'),
                Tables\Columns\TextColumn::make('gaji'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKarirs::route('/'),
            'create' => Pages\CreateKarir::route('/create'),
            'edit' => Pages\EditKarir::route('/{record}/edit'),
        ];
    }
}
