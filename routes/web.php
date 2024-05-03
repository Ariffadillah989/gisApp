<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapLocation;
use App\Http\Livewire\RsLocation;
use App\Http\Livewire\RumahSakitCitra;
use App\Http\Livewire\RumahSakitMufid;
use App\Http\Livewire\PuskesLocation;
use App\Http\Livewire\ApotekLocation;
use App\Http\Livewire\RuangRawatInap;
use App\Http\Livewire\TgkRuangRawatInap;
use App\Http\Livewire\IbnuSinaRuangRawatInap;
use App\Http\Livewire\MufidRuangRawatInap;
use App\Http\Livewire\PuskesmasRuangRawatInap;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes(['login' => false, 'register' => false]);

route::middleware('guest')->group(function(){
    Route::get('/login',Login::class)->name('login');
    Route::get('/register',Register::class)->name('register');
});

route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/map', MapLocation::class);
    Route::get('/puskesmas', PuskesLocation::class);
    Route::get('/apotek', ApotekLocation::class);
    Route::get('/rs-location', RsLocation::class);
    Route::get('/rscitra', RumahSakitCitra::class);
});

Route::get('/tgkchikrs', function(){
    return view('livewire.TgkChikDetail');
});

Route::get('/rscitra', function(){
    return view('livewire.RumahSakitCitra
    ');
});

Route::get('/pussigli', function(){
    return view('livewire.PuskesmasSigli');
});

Route::get('/rsmufid', function(){
    return view('livewire.RsMufid');
});

Route::get('/rsibnusina', function(){
    return view('livewire.RsIbnuSina');
});

Route::get('/detailruang', RuangRawatInap::class);
Route::get('/detailruangtgkchik', TgkRuangRawatInap::class);
Route::get('/detailruangibnu', IbnuSinaRuangRawatInap::class);
Route::get('/detailruangmufid', MufidRuangRawatInap::class);
Route::get('/detailruangpuskesmas', PuskesmasRuangRawatInap::class);
