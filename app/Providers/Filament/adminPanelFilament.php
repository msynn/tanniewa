<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Pages\Dashboard;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class adminPanelFilament extends Resource
{
    // Model yang digunakan untuk panel admin
    protected static ?string $model = User::class;

    // Ikon untuk tampilan navigasi admin panel
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // Label navigasi panel admin
    protected static ?string $navigationLabel = 'Admin Panel';

    // Urutan pada sidebar Filament
    protected static ?int $navigationSort = 1;

    // Fungsi untuk mengonfigurasi Form
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ])
                    ->required(),
            ]);
    }

    // Fungsi untuk mengonfigurasi Tabel
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('role')->label('Role'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    // Fungsi untuk halaman admin panel
    public static function getPages(): array
    {
        return [
            'index' => Dashboard::route('/'),
        ];
    }
}
