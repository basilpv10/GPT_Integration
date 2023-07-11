<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGptController;

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

// Route::get('/', function () {
//     return view('');
// });
Route::get('/', [ChatGptController::class, 'connect']);
Route::post('/get_message', [ChatGptController::class, 'getMessage'])->name('get.message');
