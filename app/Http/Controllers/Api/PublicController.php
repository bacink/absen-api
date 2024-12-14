<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cpns;
use App\Models\Pppk;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function showCpns(Request $request)
    {
        $signature = $request->signature;

        if ($signature === 'no_ttd') {
            $data = Cpns::whereNull('signature')->get();
        } elseif ($signature === 'ttd') {
            $data = Cpns::whereNotNull('signature')->get();
        } else {
            $data = Cpns::get();
        }


        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function saveCpnsSignature(Request $request)
    {

        $data = Cpns::whereId($request->id)->first();

        if ($data) {
            $data->signature = $request->signature;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'data' => $request->all()
        ]);
    }


    public function showPppk()
    {
        $data = Pppk::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
