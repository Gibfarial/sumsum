<?php

namespace App\Filament\Resources\Sheet1Resource\Pages;

use App\Filament\Resources\Sheet1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Sheet1Import;

class ListSheet1s extends ListRecords
{
    protected static string $resource = Sheet1Resource::class;

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
            Excel::import(new Sheet1Import, $this->file);
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
