<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\PppkImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PppkController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new PppkImport(), $request->file('file'));

        return redirect()->back()->with('success', 'Data Calon PPPK berhasil di import');
    }
}
