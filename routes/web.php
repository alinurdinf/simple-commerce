<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;

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

Route::get('/', 'HomePageController@index')->name('welcome');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function () {
    Route::resource('basic', BasicController::class);

    Route::resource('users', UserController::class)->only(['index', 'show', 'edit', 'update', 'destroy', 'store']);
    Route::resource('products', ProductController::class)->only(['index', 'show', 'edit', 'update', 'destroy', 'store']);

    Route::get('product-galleries/{id}', [ProductGalleryController::class, 'index'])->name('product-galleries.index');
    Route::resource('product-galleries', ProductGalleryController::class)->only(['show', 'edit', 'update', 'destroy', 'store']);

    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
});
