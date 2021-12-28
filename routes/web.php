<?php

use App\Http\Controllers\GetTokenController;
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

Route::get('/', [GetTokenController::class, 'getToken'])->name('get-token');
Route::post('/validate', [GetTokenController::class, 'validateToken'])->name('validate-token');
Route::get('/sonuc', function(){
    return view('result');
})->name('result');
