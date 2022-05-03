<?php

use App\Http\Controllers\BukuController;
use App\Models\Buku;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::group(['middleware' => 'auth'], function() {

    /* Routes Admin */
    Route::get('/petunjuk-penggunaan', function () {
        return view('petunjuk-penggunaan');
    })->name('petunjuk-penggunaan');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/viewapi', function () {
        return view('viewapi');
    })->name('viewapi');

    /* Route Restful, View Data Buku */
    Route::resource('buku', BukuController::class);
    
    //Route::get('buku.destroy{isbn}', 'BukuController@destroy');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Route::get('dataBuku', function () {
//     return view('buku.index');
// })->middleware(['auth'])->name('dataBuku');

require __DIR__ . '/auth.php';
