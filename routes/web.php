<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'showData']);
Route::get('/admin', [AdminController::class, 'showData']);
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::post('/delete/{id}', [AdminController::class, 'deleteData'])->name('delete');
Route::get('/update/{id}', [AdminController::class, 'updateData']);
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
