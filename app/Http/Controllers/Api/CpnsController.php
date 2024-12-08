<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\CpnsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CpnsController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import =   Excel::import(new CpnsImport(), $request->file('file'));

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
