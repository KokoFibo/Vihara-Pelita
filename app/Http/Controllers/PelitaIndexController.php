<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\DataPelita;
use Illuminate\Http\Request;


class PelitaIndexController extends Controller
{
    public function index(Request $request)
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'column' => ['in:nama,umur'],
            'jenisKelamin' => ['in:1,2'],
        ]);
        $perPage = request('perPage') ?: 10;
        $query = DataPelita::query();
        

        return Inertia::render('data/Index', [
            'datapelita' => DataPelita::query()
            ->when(request('jenisKelamin'), function($query) {
                $query->where('jenis_kelamin', request('jenisKelamin'));
           })
            ->when(request('search')  , function($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%' )
                ->orWhere('mandarin', 'like', '%' . $search . '%' );
            })
           
            ->when(request('column'), function($query){
                $query->orderBy(request('column'), request('direction'));
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
            'filters' => $request->only(['search', 'perPage', 'column', 'direction', 'jenisKelamin'])
        ]);
        

    }
} 
