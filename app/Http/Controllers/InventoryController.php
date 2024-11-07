<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportInventory;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new ImportInventory, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}