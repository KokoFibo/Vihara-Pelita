<?php

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\DataPelita;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DataPelitaController;
use App\Http\Controllers\PelitaIndexController;

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
    $data = DataPelita::all();
        foreach($data as $d ){
            $now = Carbon::now();
            $tahun = $now->year;
            $year = date('Y', strtotime($d->tgl_mohonTao));
            $selisih = $tahun - $year;
            $d->umur_sekarang = $d->umur + $selisih;
            $d->save();
        }
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});





Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/halaman', function () {
        return Inertia::render('Halaman');
    })->name('halaman');

    Route::get('/daerah', function () {
        return Inertia::render('Daerah/Index');
    })->name('daerah.index');

    
    Route::resource('/kota', KotaController::class)->except('show');

    Route::resource('/branch', BranchController::class)->except('show');


    Route::get('/datapelita/create', [DataPelitaController::class, 'create'])->name('datapelita.create');
    Route::post('/datapelita/store', [DataPelitaController::class, 'store'])->name('datapelita.store');
    Route::delete('/datapelita/{id}', [DataPelitaController::class, 'destroy'])->name('datapelita.destroy');
    Route::put('/datapelita/{id}/update', [DataPelitaController::class, 'update'])->name('datapelita.update');
    Route::get('/datapelita/{id}/edit', [DataPelitaController::class, 'edit'])->name('datapelita.edit');
    Route::get('/datapelita/{id}/show', [DataPelitaController::class, 'show'])->name('datapelita.show');
    Route::get('/datapelita', [DataPelitaController::class, 'index'])->name('datapelita.index');
});


require __DIR__ . '/auth.php';
