<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Sheet2Resource\Pages;
use App\Filament\Resources\Sheet2Resource\RelationManagers;
use App\Models\Sheet2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Sheet2Resource extends Resource
{
    protected static ?string $model = Sheet2::class;

    protected static ?string $navigationGroup =  'Stock';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_barang')
                    ->required()
                    ->label('Nama Barang'),
                Forms\Components\TextInput::make('merek')
                    ->required()
                    ->label('Merek'),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->label('Quantity')
                    ->numeric(),
                Forms\Components\TextInput::make('kondisi')
                    ->required()
                    ->label('Kondisi'),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')->label('Nomor')
                ->searchable(),
                Tables\Columns\TextColumn::make('nama_barang')->label('Nama Barang'),
                Tables\Columns\TextColumn::make('merek')->label('Merek'),
                Tables\Columns\TextColumn::make('qty')->label('Quantity'),
                Tables\Columns\TextColumn::make('kondisi')->label('Kondisi'),
                Tables\Columns\TextColumn::make('keterangan')->label('Keterangan'),
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
            'index' => Pages\ListSheet2s::route('/'),
            'create' => Pages\CreateSheet2::route('/create'),
            'edit' => Pages\EditSheet2::route('/{record}/edit'),
        ];
    }
}
