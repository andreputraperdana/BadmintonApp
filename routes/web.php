<?php

use App\Http\Controllers\IuranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SummaryAllController;
use App\Http\Controllers\SummaryIuranController;
use App\Http\Controllers\SummaryPengeluaranController;
use App\Http\Controllers\TambahMuridController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/register', [RegisterController::class, 'getindex'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'inputdata']);

Route::get('/', [LoginController::class, 'getindex'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'Logout']);

Route::get('/tambahmurid', [TambahMuridController::class, 'getindex'])->middleware('auth');
Route::post('/tambahmurid', [TambahMuridController::class, 'insert']);

Route::get('/iuran', [IuranController::class, 'getindex'])->middleware('auth');
Route::post('/iuran', [IuranController::class, 'insertiuran']);

Route::get('/pengeluaran', [PengeluaranController::class, 'getindex'])->middleware('auth');
Route::post('/pengeluaran', [PengeluaranController::class, 'insertpengeluaran']);

Route::get('/summaryiuran', [SummaryIuranController::class, 'getindex'])->middleware('auth');
Route::post('/summaryiuran', [SummaryIuranController::class, 'getData']);

Route::get('/summarypengeluaran', [SummaryPengeluaranController::class, 'getindex'])->middleware('auth');
Route::post('/summarypengeluaran', [SummaryPengeluaranController::class, 'getDataPengeluaran']);

Route::get('/summaryall', [SummaryAllController::class, 'getindex'])->middleware('auth');
Route::post('/summaryall', [SummaryAllController::class, 'getDataSummaryAll']);
