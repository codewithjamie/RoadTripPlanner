<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['DetectDevice']], function () {
    Route::resource('/', HomeController::class)->only(['index', 'show']);
    Route::get('/map/roadtrippers', [HomeController::class, 'mapping'])->name('roadtrippers');
});
