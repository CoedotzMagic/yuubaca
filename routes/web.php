<?php

use App\Http\Controllers\BukuController;
use App\Models\Buku;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/viewapi', function () {
    return view('viewapi');
})->middleware(['auth'])->name('viewapi');

/* Route Restful, View Data Buku */

Route::resource('buku', BukuController::class);

// Route::get('dataBuku', function () {
//     return view('buku.index');
// })->middleware(['auth'])->name('dataBuku');

require __DIR__ . '/auth.php';
