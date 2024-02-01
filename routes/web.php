<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
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


Route::get('/', [FotoController::class,  'index'])->name('index');
Route::resource('/foto', FotoController::class);
Route::get('/showdeleted', [FotoController::class, 'showdeleted'])->name('showdeleted');
Route::get('/{id}/restore', [FotoController::class, 'restore']);
