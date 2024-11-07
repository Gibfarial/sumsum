<?php

namespace App\Filament\Resources\InventoryResource\Pages;

use App\Filament\Resources\InventoryResource;
use App\Imports\ImportInventory;
use App\Models\Inventory;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ListInventories extends ListRecords
{
    protected static string $resource = InventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view ('filament.custom.upload-file', compact('data'));
    }

    public $file = '';

    public function save(){

        if($this->file != ''){
            Excel::import(new ImportInventory, $this->file);
        }
        // Inventory::create([
        // 'kategori'  => 'Barang',
        // 'nama_barang'  => 'Barang',
        // 'merek' =>  'Barang',
        // 'qty'  => '1',
        // 'kondisi' =>  'Barang',

        // ]);
    }
}
