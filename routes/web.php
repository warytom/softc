<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PersonsController;
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

Auth::routes(['register' => false,]);
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/persons',[PersonsController::class, 'index'])->name('index.persons');
    Route::post('/persons_store',[PersonsController::class, 'store'])->name('store.persons');
    Route::get('/logs',[LogsController::class, 'index'])->name('index.logs');
});
