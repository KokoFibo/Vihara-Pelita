<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Cabang;
use App\Models\DataPelita;
use Illuminate\Http\Request;

class DataPelitaController extends Controller
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
            // 'filters' => $request->only(['search', 'perPage', 'column', 'direction', 'jenisKelamin'])
            'filters' => request()->all(['search', 'perPage', 'column', 'direction', 'jenisKelamin'])
        ]);
        

    }


    public function create()
    {
        $cabang = Cabang::all();
        return Inertia::render('data/Create', compact('cabang'));
    }


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


    public function show($id)
    {
        return Inertia::render('data/Show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabang = Cabang::all();
        $datapelita = DataPelita::find($id);
        return Inertia::render('data/Edit', compact(['datapelita', 'cabang']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
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

        //Update process
        $datapelita = DataPelita::find($id);
        $datapelita->nama =  $request->nama;
        $datapelita->mandarin = $request->mandarin;
        $datapelita->jenis_kelamin = $request->jenis_kelamin;
        $datapelita->umur = $request->umur;
        $datapelita->alamat = $request->alamat;
        $datapelita->kota = $request->kota;
        $datapelita->telp = $request->telp;
        $datapelita->hp = $request->hp;
        $datapelita->email = $request->email;
        $datapelita->tgl_mohonTao = $request->tgl_mohonTao;
        $datapelita->keterangan = $request->keterangan;
        $datapelita->cabang_id = $request->cabang_id;

        $datapelita->save();

        return redirect()->Route('datapelita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPelita  $dataPelita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapelita = DataPelita::find($id);
        $datapelita->delete();
        return redirect()->route('datapelita.index');
    }
}
