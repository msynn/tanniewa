<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengalamanResource\Pages;
use App\Filament\Resources\PengalamanResource\RelationManagers;
use App\Models\Pengalaman;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PengalamanResource extends Resource
{
    protected static ?string $model = Pengalaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getNavigationLabel(): string
{
    return 'Pengalaman';
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('projek')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('klien')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lokasi')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tahun')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('image')
                        ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('projek')->limit('30'),
                Tables\Columns\TextColumn::make('klien')->limit('30'),
                // Tables\Columns\TextColumn::make('lokasi'),
                // Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\ImageColumn::make('image'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->after(function(Collection $records){
                    foreach($records as $key => $value){
                        if ($value->image) {
                            Storage::disk('public')->delete($value->image);
                        }
                    }
            }
        ),
            ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make()->after(function(Collection $records){
                        foreach($records as $key => $value){
                            if ($value->image) {
                                Storage::disk('public')->delete($value->image);
                            }
                        }
                }
            ),
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
            'index' => Pages\ListPengalamen::route('/'),
            'create' => Pages\CreatePengalaman::route('/create'),
            'edit' => Pages\EditPengalaman::route('/{record}/edit'),
        ];
    }
}
