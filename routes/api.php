<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\ResetController;

use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();});
    Route::post('/logout', [SessionController::class, 'logout']);
    Route::post('/reset', [ResetController::class, 'reset']);
    Route::apiResource('obat', ObatController::class);
    Route::apiResource('pasien', PasienController::class);
    Route::apiResource('resep_obat', ResepController::class);
    Route::apiResource('transaksi', TransaksiController::class);
});
