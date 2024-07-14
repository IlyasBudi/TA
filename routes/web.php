<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\RekeningController;
use App\http\Controllers\AdminController;
use App\http\Controllers\PenyewaController;
// use App\Http\Controllers\DestinationController;
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


// Route::get('/', [PageController::class, 'user']);
// // user
// Route::middleware(['auth:web'])->group(
//     function () {
//         // isi disini routing yang cuma bisa diakses oleh user
//         // contoh penulisan
//         Route::get('/welcome', [PageController::class, 'user']);
//     }
// );

// Admin
Route::prefix('/admin')->middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [PageController::class, 'admin']);
        // Staff
        Route::get('/staff', [AdminController::class, 'staff']);
        Route::get('/staff/{id}', [AdminController::class, 'showStaff']);
        // Penyewa
        Route::get('/penyewa', [AdminController::class, 'penyewa']);
        Route::get('/penyewa/{id}', [AdminController::class, 'showPenyewa']);
        // Kantor Cabang
        Route::get('/kantorcabang', [AdminController::class, 'kantorcabang']);
        Route::get('/kantorcabang/{id}', [AdminController::class, 'showKantorCabang']);
        Route::get('/kantorcabang/bus/{id}', [AdminController::class, 'showBus']);
        Route::get('/kantorcabang/destination/{id}', [AdminController::class, 'showDestination']);
        Route::get('/kantorcabang/{id}/edit', [AdminController::class, 'editKantorCabang']);
        Route::put('/kantorcabang/{id}', [AdminController::class, 'updateKantorCabang']);
    }
);

// Staff
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
        Route::get('/destination', [DestinasiController::class, 'index']);
        Route::get('/destination/add', [DestinasiController::class, 'create']);
        Route::post('/destination', [DestinasiController::class, 'store'])->name('destination.store');
        Route::get('/destination/{id}', [DestinasiController::class, 'show']);
        Route::get('/destination/{id}/edit', [DestinasiController::class, 'edit']);
        Route::put('/destination/{id}', [DestinasiController::class, 'update']);
        Route::get('/destination/{id}/delete', [DestinasiController::class, 'destroy']);
        // Rekening
        Route::get('/rekening', [RekeningController::class, 'index']);
        Route::get('/rekening/add', [RekeningController::class, 'create']);
        Route::post('/rekening', [RekeningController::class, 'store']);
        Route::get('/rekening/{id}', [RekeningController::class, 'show']);
        Route::get('/rekening/{id}/edit', [RekeningController::class, 'edit']);
        Route::put('/rekening/{id}', [RekeningController::class, 'update']);
        Route::get('/rekening/{id}/delete', [RekeningController::class, 'destroy']);
    }
);

// Penyewa
Route::get('/', [PenyewaController::class, 'landingpage']);
Route::get('/about', [PenyewaController::class, 'about']);
Route::get('/bookingpage', [PenyewaController::class, 'bookingpage']);
Route::get('/kantorcabang/{id}', [PenyewaController::class, 'detailkantorcabang']);


// web.php
Route::post('/kantorcabang/data', [PenyewaController::class, 'getData']);
