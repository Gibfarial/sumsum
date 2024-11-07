<?php

namespace App\Filament\Resources\PemeliharaanResource\Pages;

use App\Filament\Resources\PemeliharaanResource;
use App\Imports\PemeliharaanImport;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ListPemeliharaans extends ListRecords
{
    protected static string $resource = PemeliharaanResource::class;

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
            Excel::import(new PemeliharaanImport, $this->file);
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

