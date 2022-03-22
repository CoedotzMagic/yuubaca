<?php

use App\Http\Controllers\BukuController;
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

/* Routes Admin */

Route::get('/petunjuk-penggunaan', function () {
    return view('petunjuk-penggunaan');
})->middleware(['auth'])->name('petunjuk-penggunaan');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/buku', function () {
       return view('buku/buku');
    })->name('buku');

    Route::put('/tambah-buku', [BukuController::class, 'store'])->name('tambah.buku');

});

require __DIR__.'/auth.php';
