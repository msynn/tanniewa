<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Aplications;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AplicationsResource\Pages;
use App\Filament\Resources\AplicationsResource\RelationManagers;

class AplicationsResource extends Resource
{
    protected static ?string $model = Aplications::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-grid-add';

    public static function getNavigationLabel(): string
{
    return 'Tambah Fitur Aplikasi';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->required()->image()->disk('public')
                    ,
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('link')
                    ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('content')->html()->limit('30'),
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
            'index' => Pages\ListAplications::route('/'),
            'create' => Pages\CreateAplications::route('/create'),
            'edit' => Pages\EditAplications::route('/{record}/edit'),
        ];
    }
}
