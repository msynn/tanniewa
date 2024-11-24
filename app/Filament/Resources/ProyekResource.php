<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\teams;
use App\Models\Proyek;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProyekResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProyekResource\RelationManagers;
use Filament\Forms\Components\Actions\Modal\Actions\Action;

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
                    ->maxLength(255)
                    ->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),


                    Forms\Components\Textarea::make('deskripsi_proyek')
                        ->required()
                        ->maxLength(65535)
                        ->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),

                    // FileUpload with additional configuration for storage and validation
                    Forms\Components\FileUpload::make('unggah_file')
                        ->disk('public') // Specify the disk to store the file, e.g., 'public'
                        ->directory('proyek-files') // Directory to store files
                        ->maxSize(10240) // Max size in KB (10 MB)
                        ->nullable()->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),// Optional: allows null values if no file is uploaded

                    Forms\Components\DatePicker::make('tanggal_mulai')->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),

                    Forms\Components\DatePicker::make('tanggal_selesai')->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),

                    Forms\Components\Textarea::make('catatan')
                        ->maxLength(65535)->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),

                    // Fixing the unique validation issue
                    Forms\Components\Select::make('status_proyek')
                        ->options([
                            'Berjalan' => 'Berjalan',
                            'Selesai' => 'Selesai',
                            'Ditunda' => 'Ditunda',
                            'Dibatalkan' => 'Dibatalkan',
                        ])
                        ->required()
                        ->placeholder('Pilih Status Proyek'),

                    Forms\Components\Select::make('project_manager')
                        ->label('Project Manager')
                        ->options(teams::where('position', 'Project Manager')->get()->mapWithKeys(function ($team) {
                            return [$team->id => $team->name . ' - ' . $team->position];
                        }))
                        ->placeholder('Pilih Project Manager')->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),

                    Forms\Components\Select::make('anggota_tim')
                        ->label('Anggota Tim')
                        ->options(teams::all()->mapWithKeys(function ($team) {
                            return [$team->id => $team->name . ' - ' . $team->position];
                        }))
                        ->searchable()
                        ->multiple()
                        ->placeholder('Pilih Anggota Tim')->hidden(function () {
                        $user = auth()->user();
                        return $user->hasRole('Project Manager');
                    }),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_proyek'),
                // Tables\Columns\TextColumn::make('deskripsi_proyek'),
                // Tables\Columns\TextColumn::make('tanggal_mulai')
                //     ->date(),

                // Tables\Columns\TextColumn::make('tanggal_selesai')
                //     ->date(),

                // Tables\Columns\TextColumn::make('catatan'),
                Tables\Columns\BadgeColumn::make('status_proyek')->label('Status Proyek')
            ->colors([

                'success' => 'Berjalan',    // Hijau untuk Berjalan
                'primary' => 'Selesai',    // Biru untuk Selesai
                'warning' => 'Ditunda',    // Kuning untuk Ditunda
                'danger' => 'Dibatalkan',  // Merah untuk Dibatalkan
            ]),

                // Tables\Columns\TextColumn::make('project_manager'),
                Tables\Columns\TextColumn::make('anggota_tim'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

                Tables\Actions\DeleteAction::make(),
                 // Custom Download Action
            Tables\Actions\Action::make('download')
            ->label('Download File')
            ->icon('heroicon-o-download')
            ->color('primary')
            ->action(function ($record) {
                if ($record->unggah_file) {
                    return response()->download(storage_path('app/public/' . $record->unggah_file));
                } else {
                    Filament::notify('warning', 'Tidak ada file untuk diunduh.');
                }
            }),
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
