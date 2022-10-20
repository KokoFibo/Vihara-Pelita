<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Cabang;
use App\Models\DataPelita;
use Illuminate\Http\Request;

class DataPelitaController extends Controller
{

    public function index()
    {

        $query = DataPelita::query();

        if (request('search')) {
            $query->where('nama', 'LIKE', '%' . request('search') . '%');
        }

        return Inertia::render('data/Index', [
            'datapelita' => $query->paginate(10),

            'filters' => request()->all(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::all();
        return Inertia::render('data/Create', compact('cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'mandarin' => ['required'],
            'jenis_kelamin' => ['required'],
            'umur' => ['required', 'numeric', 'min:1', 'max:150'],
            'alamat' => ['required'],
            'kota' => ['required'],
            'telp' => ['nullable', 'numeric', 'min_digits:9', 'max_digits:13'],
            'hp' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'tgl_mohonTao' => ['date'],
            'keterangan' => ['nullable'],
            'cabang_id' => ['required']
        ]);

        DataPelita::create([
            'nama' => $request->nama,
            'mandarin' => $request->mandarin,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'hp' => $request->hp,
            'email' => $request->email,
            'tgl_mohonTao' => $request->tgl_mohonTao,
            'keterangan' => $request->keterangan,
            'cabang_id' => $request->cabang_id,
        ]);

        return redirect()->route('datapelita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function show(DataPelita $dataPelita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPelita $dataPelita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPelita $dataPelita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPelita $dataPelita)
    {
        //
    }
}
