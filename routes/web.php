<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edit_store/{id}',[StoreController::class,'edit']);

Route::get('/detail/{id}',[StoreController::class,'detail']);

Route::patch('/update_store/{id}',[StoreController::class,'update']);

Route::get('/import',[StoreController::class,'index']);
Route::post('/import',[StoreController::class,'import']);


Route::get('/search_store',[StoreController::class,'search_store']);

