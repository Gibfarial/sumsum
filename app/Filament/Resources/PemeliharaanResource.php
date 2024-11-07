<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemeliharaanResource\Pages;
use App\Filament\Resources\PemeliharaanResource\RelationManagers;
use App\Models\Pemeliharaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemeliharaanResource extends Resource
{
    protected static ?string $model = Pemeliharaan::class;
    
    protected static ?string $navigationGroup =  'Stock';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kategori')
                ->required(),
            Forms\Components\TextInput::make('nama_barang')
                ->required(),
            Forms\Components\TextInput::make('merek')
                ->required(),
            Forms\Components\TextInput::make('qty')
                ->required()
                ->numeric(),
            Forms\Components\Select::make('kondisi')
                ->options([
                    'Baik' => 'Baik',
                    'Rusak' => 'Rusak',
                ])
                ->required(),
            Forms\Components\TextInput::make('jenis_pemeliharaan')
                ->required(),
            Forms\Components\TextInput::make('hasil_pelaksanaan')
                ->required(),
            Forms\Components\TextInput::make('estimasi_biaya')
                ->required()
                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori'),
                Tables\Columns\TextColumn::make('nama_barang'),
                Tables\Columns\TextColumn::make('merek'),
                Tables\Columns\TextColumn::make('qty'),
                Tables\Columns\TextColumn::make('kondisi'),
                Tables\Columns\TextColumn::make('jenis_pemeliharaan'),
                Tables\Columns\TextColumn::make('hasil_pelaksanaan'),
                Tables\Columns\TextColumn::make('estimasi_biaya'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPemeliharaans::route('/'),
            'create' => Pages\CreatePemeliharaan::route('/create'),
            'edit' => Pages\EditPemeliharaan::route('/{record}/edit'),
        ];
    }
}
