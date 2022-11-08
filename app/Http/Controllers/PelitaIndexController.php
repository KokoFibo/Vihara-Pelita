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
        

        return Inertia::render('data/Index', [
            'datapelita' => DataPelita::query()
            ->when(Request::has('jenisKelamin'), function($query) {
                $query->where('jenis_kelamin', Request::input('jenisKelamin'));
           })
            ->when(Request::input('search')  , function($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%' )
                ->orWhere('mandarin', 'like', '%' . $search . '%' );
                
                
            })
           
            ->when(Request::has('column'), function($query){
                $query->orderBy(Request::input('column'), Request::input('direction'));
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
            'filters' => Request::only(['search', 'perPage', 'column', 'direction', 'jenisKelamin'])
        ]);
        

    }
} 
