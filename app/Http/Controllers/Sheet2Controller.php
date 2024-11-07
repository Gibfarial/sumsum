<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Sheet2Import;
use Maatwebsite\Excel\Facades\Excel;

class Sheet2Controller extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new Sheet2Import, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}