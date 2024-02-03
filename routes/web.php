<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\KomentarController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticating']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [FotoController::class,  'index'])->name('index')->middleware('auth');
Route::resource('/foto', FotoController::class);
Route::resource('/album', AlbumController::class);
Route::resource('/like', LikeController::class);
Route::resource('/komentar', KomentarController::class);
Route::get('/showdeleted', [FotoController::class, 'showdeleted'])->name('showdeleted');
Route::get('/{id}/restore', [FotoController::class, 'restore']);
