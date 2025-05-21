<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriResource\Pages;
use App\Filament\Resources\IndustriResource\RelationManagers;
use App\Models\Industri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Guru;



class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    //Tambahan untuk ganti label
    protected static ?string $pluralLable = 'Daftar Industri';
    protected static ?string $label = 'Industri';
    protected static ?string $navigationLabel = 'Industri';

    protected static ?string $slug = 'Industri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('bidang_usaha')
                    ->label('Bidang Usaha')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('nama')
                    ->label('Nama Industri')
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),

                TextInput::make('kontak')
                    ->label('Kontak')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                
                Select::make('guru_pembimbing')
                    ->label('Guru Pembimbing')
                    ->options(Guru::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                

                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('bidang_usaha')->label('Bidang Usaha'),
                TextColumn::make('alamat')->label('Alamat'),
                TextColumn::make('kontak')->label('Kontak'),
                TextColumn::make('email')->label('E-mail'),
                TextColumn::make('guru.nama')->label('Guru Pembimbing'),
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }
}
