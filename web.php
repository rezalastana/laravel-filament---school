<?php

use App\Http\Controllers\BeritaControllers;
use App\Http\Controllers\HomepageControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllers;
use App\Models\BeritaPuskesmas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageControllers::class, 'index']);
Route::get('berita_sekolah', [BeritaControllers::class, 'index']);
Route::get('berita_vitamin', [BeritaControllers::class, 'berita_v']);
Route::get('berita_puskesmas', [BeritaControllers::class, 'berita_s']);
Route::get('berita_penyaluran', [BeritaControllers::class, 'berita_p']);

Route::get('detail_profile', function() {
    return view('home.pages.views.detail_profile');
});

Route::get('/login', function () {
    return view('home.Auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $panel = $request->input('panel');

    if ($panel === 'admin') {
        return redirect(route('filament.admin.auth.login'));
    } elseif ($panel === 'puskesmas') {
        return redirect(route('filament.puskesmas.auth.login'));
    } elseif ($panel === 'sekolah') {
        return redirect(route('filament.sekolah.auth.login'));
    }
    return redirect(route('login'))->with('error', 'Pilihan panel tidak valid.');
});

