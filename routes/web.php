<?php

use App\Http\Controllers\ProfileController;
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
    return redirect()->route('welcome');
});

Route::get('/welcome', function () {
    return view('AES-App.welcome');
})->middleware(['auth'])->name('welcome');

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers\AES'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/storeFile', 'HomeController@store')->name('storeFile');
    Route::get('/perviewFile/{id}', 'HomeController@preview')->name('perviewFile');
    Route::delete('/deletefile/{id}', 'HomeController@destroy')->name('deletefile');
    Route::get('/encryptfile/{id}', 'HomeController@encryptfile')->name('encryptfile');
    Route::get('/decryptfile/{id}', 'HomeController@decryptfile')->name('decryptfile');
});

require __DIR__.'/auth.php';
