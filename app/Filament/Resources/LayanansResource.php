<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayanansResource\Pages;
use App\Filament\Resources\LayanansResource\Pages\EditLayanans;
use App\Filament\Resources\LayanansResource\RelationManagers;
use App\Models\Layanans;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayanansResource extends Resource
{
    protected static ?string $model = Layanans::class;
    protected static ?string $navigationGroup = 'Tentang Kami';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getNavigationLabel(): string
{
    return 'Layanan';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\TextInput::make(name: 'label')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('value')
                        ->maxLength(255),

                    ]
                        ),

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
                Tables\Actions\EditAction::make(),


                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanans::route('/create'),
            'edit' => Pages\EditLayanans::route('/{record}/edit'),
        ];
    }
}
