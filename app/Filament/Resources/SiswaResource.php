<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nis')
                    ->label('NIS')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('nama')
                    ->label('Nama Siswa')
                    ->required(),

                Select::make('gender')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('kelas')
                    ->label('Kelas')
                    ->required(),

                TextInput::make('kontak')
                    ->label('Kontak')
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),

                TextInput::make('status_pkl')
                    ->label('Status PKL')
                    ->default('belum')
                    ->disabled()
                    ->dehydrated(false),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')->label('NIS'),
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('gender')->label('Gender'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('kelas')->label('kelas'),
                TextColumn::make('alamat')->label('alamat'),
                TextColumn::make('kontak')->label('kontak'),
                TextColumn::make('status_pkl')->label('Status PKL'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->searchable();
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
