<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CpnsController;
use App\Http\Controllers\Api\PppkController;
use App\Http\Controllers\Api\SignatureController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum'])
    ->group(function () {
        // Route::get('/import-pppk', function () {
        //     // Uses first & second middleware...
        // });

        // Route::get('/user/profile', function () {
        //     // Uses first & second middleware...
        // });

        Route::controller(PppkController::class)
            ->name('pppk.')
            ->group(function () {
                Route::post('/import-pppk', 'import')->name('import');
            });

        Route::controller(CpnsController::class)
            ->name('cpns.')
            ->group(function () {
                Route::post('/import-cpns', 'import')->name('import');
            });
    });

Route::controller(SignatureController::class)
    ->name('signature.')
    ->middleware('guest')
    ->group(function () {
        Route::post('/sign-pppk', 'savePppkSignature')->name('pppk');
        Route::post('/sign-cpns', 'saveCpnsSignature')->name('cpns');
    });
