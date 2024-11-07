<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Sheet1Resource\Pages;
use App\Filament\Resources\Sheet1Resource\RelationManagers;
use App\Models\Sheet1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Sheet1Resource extends Resource
{
    protected static ?string $model = Sheet1::class;
    
    protected static ?string $navigationGroup =  'Stock';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama_barang')->required(),
            Forms\Components\TextInput::make('merk_spesifikasi')->required(),
            Forms\Components\TextInput::make('qty')->required()->numeric(),
            Forms\Components\TextInput::make('harga_pasaran')->required()->numeric(),
            Forms\Components\TextInput::make('jumlah')->disabled(),
            Forms\Components\Select::make('status')
            ->options([
                'ada' => 'ada',
                'tidak_ada' => 'Tidak Ada',
            ])
            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')->label('Nomor')
                ->searchable(),
                Tables\Columns\TextColumn::make('nama_barang')->searchable(),
                Tables\Columns\TextColumn::make('merk_spesifikasi')->searchable(),
                Tables\Columns\TextColumn::make('qty')->searchable(),
                Tables\Columns\TextColumn::make('harga_pasaran')->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->searchable(),
                tables\Columns\TextColumn::make('status')->searchable() , // Menampilkan checkbox


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
            'index' => Pages\ListSheet1s::route('/'),
            'create' => Pages\CreateSheet1::route('/create'),
            'edit' => Pages\EditSheet1::route('/{record}/edit'),
        ];
    }
}
