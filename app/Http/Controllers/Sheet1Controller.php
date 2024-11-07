<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Sheet1Import;
use Maatwebsite\Excel\Facades\Excel;

class Sheet1Controller extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new Sheet1Import, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}