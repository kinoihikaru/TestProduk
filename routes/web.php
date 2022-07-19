<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiGoogleTranslate\ApiLanguagesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Produk\ProdukController;

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

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/translate', [LandingController::class, 'translate']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/translate-api', ApiLanguagesController::class);
    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);
});
