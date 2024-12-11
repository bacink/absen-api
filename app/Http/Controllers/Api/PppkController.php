<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\PppkImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class PppkController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = (new PppkImport)->import($request->file('file'), null, Excel::CSV);
        if ($import) {
            return response()->json([
                'status' => 'success',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'data' => $request->all()
        ]);
    }
}
