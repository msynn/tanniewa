<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteResource\Pages;
use App\Filament\Resources\WebsiteResource\RelationManagers;
use App\Models\Website;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\TextInput::make('produk')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukkan jenis Website'),
                    Forms\Components\TextInput::make('harga')->prefix('Rp')
                        ->required()->integer()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('keterangan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('perpanjangan')->prefix('Rp')
                    ->required()->integer()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('link')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukkan link desain di sini'),
                ])
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produk'),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('perpanjangan'),
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListWebsites::route('/'),
            'create' => Pages\CreateWebsite::route('/create'),
            'edit' => Pages\EditWebsite::route('/{record}/edit'),
        ];
    }
}
