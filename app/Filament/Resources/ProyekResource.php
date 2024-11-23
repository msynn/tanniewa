<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyekResource\Pages;
use App\Filament\Resources\ProyekResource\RelationManagers;
use App\Models\Proyek;
use App\Models\teams;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProyekResource extends Resource
{
    protected static ?string $model = Proyek::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Forms\Components\TextInput::make('nama_proyek')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('deskripsi_proyek')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\FileUpload::make('unggah_file')->multiple()
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(3092),
                    Forms\Components\DatePicker::make('tanggal_mulai'),
                    Forms\Components\DatePicker::make('tanggal_selesai'),
                    Forms\Components\Textarea::make('catatan')
                        ->maxLength(65535),
                        Forms\Components\Select::make('status_proyek')->options(
                            [
                                // 'Berjalan','Selesai','Ditunda','Dibatalkan'
                                'Berjalan' => 'Berjalan',
                                'Selesai' => 'Selesai',
                                'Ditunda' => 'Ditunda',
                                'Dibatalkan' => 'Dibatalkan',
                    ])->required()->unique(ignorable:fn($record)=>$record)
                    ->placeholder('Pilih Status Proyek'),
                    Forms\Components\Select::make('project_manager')
                        ->label('Project Manager')
                        ->options(teams::where('position', 'Project Manager')->get()->mapWithKeys(function ($team) {
                            return [$team->id => $team->name . ' - ' . $team->position];
                        }))
                        ->placeholder('Pilih Project Manager'),
                        Forms\Components\Select::make('anggota_tim')
                        ->label('Anggota Tim')
                        ->options(teams::all()->mapWithKeys(function ($team) {
                            return [$team->id => $team->name . ' - ' . $team->position];
                        }))
                        ->searchable()->multiple()
                        ->placeholder('Pilih Anggota Tim'),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_proyek'),
                Tables\Columns\TextColumn::make('deskripsi_proyek'),
                Tables\Columns\TextColumn::make('unggah_file'),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date(),
                Tables\Columns\TextColumn::make('catatan'),
                Tables\Columns\TextColumn::make('status_proyek'),
                Tables\Columns\TextColumn::make('project_manager'),
                Tables\Columns\TextColumn::make('anggota_tim'),
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
            'index' => Pages\ListProyeks::route('/'),
            'create' => Pages\CreateProyek::route('/create'),
            'edit' => Pages\EditProyek::route('/{record}/edit'),
        ];
    }
}
