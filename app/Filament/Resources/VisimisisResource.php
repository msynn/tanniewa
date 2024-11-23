<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisimisisResource\Pages;
use App\Filament\Resources\VisimisisResource\RelationManagers;
use App\Models\Visimisis;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisimisisResource extends Resource

{
    protected static ?string $model = Visimisis::class;
    protected static ?string $navigationGroup = 'Tentang Kami';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getNavigationLabel(): string
{
    return 'Visi Misi';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make(name: 'title')->options(
                        [
                            'VISI' => 'VISI',
                            'MISI' => 'MISI'
                        ])->required()->unique(ignorable:fn($record)=>$record),

                    Forms\Components\RichEditor::make('content')
                        ->required(),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content')->limit('40'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVisimises::route('/'),
            'create' => Pages\CreateVisimisis::route('/create'),
            'edit' => Pages\EditVisimisis::route('/{record}/edit'),
        ];
    }
}
