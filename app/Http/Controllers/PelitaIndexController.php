<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\DataPelita;
use Illuminate\Support\Facades\Request;

class PelitaIndexController extends Controller
{
    public function index()
    {
        $perPage = Request::input('perPage') ?: 10;
        $query = DataPelita::query();
        // return Inertia::render('Customer/Index', [
        //     'customer' => Customer::paginate(5)
        // ]);

        return Inertia::render('data/Index', [
            'datapelita' => DataPelita::query()
            ->when(Request::input('search'), function($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%' )
                ->orWhere('mandarin', 'like', '%' . $search . '%' );
            })
            ->paginate($perPage)
            ->withQueryString()
            ->through(fn($datapelita) => [
                'id' =>$datapelita->id,
                'nama' =>$datapelita->nama,
                'mandarin' =>$datapelita->mandarin,
                'umur' =>$datapelita->umur,
                'tgl_mohonTao' =>$datapelita->tgl_mohonTao,
                'jenis_kelamin' =>$datapelita->jenis_kelamin,
            ]),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }
} 
