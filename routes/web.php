<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapLocation;
use App\Http\Livewire\RsLocation;
use App\Http\Livewire\RumahSakitCitra;
use App\Http\Livewire\RumahSakitMufid;
use App\Http\Livewire\PuskesLocation;
use App\Http\Livewire\ApotekLocation;
use App\Http\Livewire\RuangRawatInap;
use App\Http\Livewire\RsuTgkChik;
use App\Http\Livewire\RsIbnuSina;
use App\Http\Livewire\PusSigli;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/map', MapLocation::class);
Route::get('/puskesmas', PuskesLocation::class);
Route::get('/apotek', ApotekLocation::class);
Route::get('/rs-location', RsLocation::class);
Route::get('/rscitra', RumahSakitCitra::class);
Route::get('/rsmufid', RumahSakitMufid::class);
Route::get('/detailruang', RuangRawatInap::class);
Route::get('/rsu', RsuTgkChik::class);
Route::get('/rsibnusina', RsIbnuSina::class);
Route::get('/pussigli', PusSigli::class);
// Route::view('/rsibnusina', 'livewire.RsIbnuSina');
// Route::view('/', 'livewire.RsuTgkChik');