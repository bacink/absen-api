<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\CpnsImport;
use App\Models\Cpns;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class CpnsController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,csv'
        ]);

        $import = (new CpnsImport)->import($request->file('file'), null, Excel::CSV);
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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,csv'
        ]);

        $import = (new CpnsImport)->import($request->file('file'), null, Excel::CSV);
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
