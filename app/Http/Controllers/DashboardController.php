<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\DataPelita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard () {
        $now = Carbon::now();
        $tahunIni = $now->year;
        $totalUmat = DataPelita::all()->count();
        $pria = DataPelita::where('jenis_kelamin','1')->count();
        $wanita = DataPelita::where('jenis_kelamin','2')->count();
        $priaDewasa = DataPelita::where('jenis_kelamin','1')
        ->where('umur_sekarang', '>=', '17')->count();
        $wanitaDewasa = DataPelita::where('jenis_kelamin','2')
        ->where('umur_sekarang', '>=', '17')->count();
        $anakLaki = DataPelita::where('jenis_kelamin','1')
        ->where('umur_sekarang', '<=', '16')->count();
        $anakPerempuan = DataPelita::where('jenis_kelamin','2')
        ->where('umur_sekarang', '<=', '16')->count();
        $umatTahunIni = DataPelita::where('tgl_mohonTao','>=', $tahunIni.'/01/01')->count();
        return Inertia::render('Dashboard', compact(['totalUmat', 'pria', 'wanita', 'priaDewasa', 'wanitaDewasa', 'anakLaki', 'anakPerempuan', 'umatTahunIni']));
    }
    
}
