<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::middleware(['auth', 'must-admin-or-user'])->group(function () {
    Route::get('/', [FotoController::class, 'index'])->name('index');
    Route::resource('/foto', FotoController::class);
    Route::resource('/album', AlbumController::class);
    Route::resource('/like', LikeController::class);
    Route::resource('/komentar', KomentarController::class);
    Route::get('/table', [FotoController::class, 'showtable'])->name('foto.table');
    Route::get('/delete/{id}', [FotoController::class, 'delete'])->name('foto.delete');
    Route::get('/exportalbum/{id}', [AlbumController::class, 'exportPdfDetails'])->name('album.exportPdfDetails');
    Route::get('/exportfoto/{id}', [FotoController::class, 'exportfotoPdfDetails'])->name('foto.exportPdfDetails');

    Route::middleware('must-admin')->group(function () {
        Route::get('/showdeleted', [FotoController::class, 'showdeleted'])->name('showdeleted');
        Route::get('/{id}/restore', [FotoController::class, 'restore']);
        
    });
});
