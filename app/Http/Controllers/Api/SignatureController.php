<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cpns;
use App\Models\Pppk;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function savePppkSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required|string'
        ]);

        $pppk = Pppk::whereId($request->id)->first();

        $pppk->signature = $request->signature();

        $save = $pppk->save();

        if ($save) {
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

    public function saveCpnsSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required|string'
        ]);

        $cpns = Cpns::whereId($request->id)->first();

        $cpns->signature = $request->signature();

        $save = $cpns->save();

        if ($save) {
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
