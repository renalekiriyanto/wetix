<?php

use App\Http\Controllers\Dashboard\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->group(function(){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/update/{id}', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'destroy']);
    });
});

Auth::routes();
