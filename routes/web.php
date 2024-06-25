<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\KantorCabangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/penyewaregister', [AuthController::class, "penyewaregister"])->name('penyewaregister');
Route::get('/staffregister', [AuthController::class, "staffregister"])->name('staffregister');
Route::post('/penyewaregister', [AuthController::class, "dopenyewaregister"])->name('do.penyewaregister');
Route::post('/staffregister', [AuthController::class, "dostaffregister"])->name('do.staffregister');


Route::get('/', [PageController::class, 'user']);
// user
Route::middleware(['auth:web'])->group(
    function () {
        // isi disini routing yang cuma bisa diakses oleh user
        // contoh penulisan
        Route::get('/welcome', [PageController::class, 'user']);
    }
);

// admin
Route::prefix('/admin')->middleware('auth:admin')->group(
    function () {
        Route::get('/dashboard', [PageController::class, 'admin']);
    }
);

// pka
Route::prefix('/staff')->middleware('auth:staff')->group(
    function () {
        Route::get('/dashboard', [PageController::class, 'staff']);
        // Kantor_cabang
        Route::get('/kantorcabang', [KantorCabangController::class, 'index']);
        Route::get('/kantorcabang/add', [KantorCabangController::class, 'create']);
        Route::post('/kantorcabang', [KantorCabangController::class, 'store']);
        Route::get('/kantorcabang/{id}', [KantorCabangController::class, 'show']);
        Route::get('/kantorcabang/{id}/edit', [KantorCabangController::class, 'edit']);
        Route::put('/kantorcabang/{id}', [KantorCabangController::class, 'update']);
        Route::get('/kantorcabang/{id}/delete', [KantorCabangController::class, 'destroy']);
        // Bus
        Route::get('/bus', [BusController::class, 'index']);
        Route::get('/bus/add', [BusController::class, 'create']);
        Route::post('/bus', [BusController::class, 'store']);
        Route::get('/bus/{id}', [BusController::class, 'show']);
        Route::get('/bus/{id}/edit', [BusController::class, 'edit']);
        Route::put('/bus/{id}', [BusController::class, 'update']);
        Route::get('/bus/{id}/delete', [BusController::class, 'destroy']);
        // Destination
        Route::get('/destination', [DestinationController::class, 'index']);
        Route::get('/destination/add', [DestinationController::class, 'create']);
        Route::post('/destination', [DestinationController::class, 'store']);
        Route::get('/destination/{id}', [DestinationController::class, 'show']);
        Route::get('/destination/{id}/edit', [DestinationController::class, 'edit']);
        Route::put('/destination/{id}', [DestinationController::class, 'update']);
        Route::get('/destination/{id}/delete', [DestinationController::class, 'destroy']);
    }
);