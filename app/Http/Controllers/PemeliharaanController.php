<?php

namespace App\Http\Controllers;

use App\Imports\PemeliharaanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new PemeliharaanImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function showImportForm()
    {
        return view('pemeliharaan.import'); // View untuk form upload
    }
}