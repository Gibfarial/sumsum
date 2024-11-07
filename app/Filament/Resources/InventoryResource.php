<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\Inventory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no')
                    ->label('Nomor') // Label untuk field
                    ->required(), // Jika kolom ini wajib diisi
                Forms\Components\TextInput::make('kategori')
                    ->required(),
                Forms\Components\TextInput::make('nama_barang')
                    ->required(),
                Forms\Components\TextInput::make('merek')
                    ->required(),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric(),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')->label('Nomor')
                ->searchable(),
                Tables\Columns\TextColumn::make('kategori')->searchable(),
                Tables\Columns\TextColumn::make('nama_barang')->searchable(),
                Tables\Columns\TextColumn::make('merek')->searchable(),
                Tables\Columns\TextColumn::make('qty')->searchable(),
                Tables\Columns\TextColumn::make('kondisi')->searchable(),
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
            // ->headerActions([
            //     Tables\Actions\CreateAction::make(),
            // ]);
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }
}
