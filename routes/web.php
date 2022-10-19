<?php

use App\Http\Controllers\DataPelitaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/halaman', function () {
    return Inertia::render('Halaman');
})->middleware(['auth', 'verified'])->name('halaman');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/datapelita', [DataPelitaController::class, 'index'])->name('datapelita');
    Route::get('/datapelita/create', [DataPelitaController::class, 'create'])->name('datapelita.create');
    Route::post('/datapelita/store', [DataPelitaController::class, 'store'])->name('datapelita.store');
});


require __DIR__ . '/auth.php';
