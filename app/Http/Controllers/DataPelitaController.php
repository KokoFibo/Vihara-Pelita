<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Branch;
use App\Models\Cabang;
use Carbon\Traits\Date;
use App\Models\DataPelita;
use Illuminate\Support\Str;
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
            ->when(request('umur1'), function($query, $umur1) {
                $query->where('umur_sekarang','>=', $umur1 );
            })
            ->when(request('umur2'), function($query,  $umur2) {
                $query->where('umur_sekarang','<=', $umur2 );
                
            })
            ->when(request('tgl1'), function($query,  $tgl1) {
                $query->where('tgl_mohonTao','>=', $tgl1 );
                
            })
            ->when(request('tgl2'), function($query,  $tgl2) {
                $query->where('tgl_mohonTao','<=', $tgl2 );
                
            })
           
            
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
                'umur_sekarang' =>$datapelita->umur_sekarang,
                'tgl_mohonTao' =>$datapelita->tgl_mohonTao,
                'jenis_kelamin' =>$datapelita->jenis_kelamin,
            ]),
            // 'filters' => $request->only(['search', 'perPage', 'column', 'direction', 'jenisKelamin'])
            'filters' => request()->all(['search', 'perPage', 'column', 'direction', 'jenisKelamin', 'umur1', 'umur2', 'tgl1', 'tgl2'])
        ]);
        

    }

     

    public function create()
    {
        $branch = Branch::all();
        return Inertia::render('data/Create', compact('branch'));
    }

    


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'mandarin' => ['required'],
            'jenis_kelamin' => ['required'],
            'umur' => ['required', 'numeric', 'min:1', 'max:150'],
            'umur_sekarang' => ['nullable'],
            'alamat' => ['required'],
            'kota' => ['required'],
            'telp' => ['nullable', 'numeric', 'min_digits:9', 'max_digits:13'],
            'hp' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'tgl_mohonTao' => ['date'],
            'status' => ['nullable', 'between:"Active","Inactive"'],
            'branch_id' => ['required']
        ]);

        $status = $request->status;
        if ($status == null) {
            $status == 'Active';
        }
        
        DataPelita::create([
            'nama' => $request->nama,
            'mandarin' => $request->mandarin,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'umur_sekarang' => $this->hitungUmurSekarang($request->tgl_mohonTao, $request->umur),
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'hp' => $request->hp,
            'email' => $request->email,
            'tgl_mohonTao' => $request->tgl_mohonTao,
            'status' => $this->checkStatus($request->status),
            'branch_id' => $request->branch_id,
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
        $branch = Branch::all();
        $datapelita = DataPelita::find($id);
        return Inertia::render('data/Edit', compact(['datapelita', 'branch']));
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
            'umur_sekarang' => ['nullable'],
            'alamat' => ['required'],
            'kota' => ['required'],
            'telp' => ['nullable', 'numeric', 'min_digits:9', 'max_digits:13'],
            'hp' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'tgl_mohonTao' => ['date'],
            'status' => ['nullable'],
            'branch_id' => ['required']
        ]);

        //Update process
        $datapelita = DataPelita::find($id);
        $datapelita->nama =  $request->nama;
        $datapelita->mandarin = $request->mandarin;
        $datapelita->jenis_kelamin = $request->jenis_kelamin;
        $datapelita->umur = $request->umur;
         $datapelita->umur_sekarang = $this->hitungUmurSekarang($request->tgl_mohonTao, $request->umur);
        $datapelita->alamat = $request->alamat;
        $datapelita->kota = $request->kota;
        $datapelita->telp = $request->telp;
        $datapelita->hp = $request->hp;
        $datapelita->email = $request->email;
        $datapelita->tgl_mohonTao = $request->tgl_mohonTao;
        $datapelita->status = $request->status;
        $datapelita->branch_id = $request->branch_id;

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
    public function hitungUmurSekarang($tgl, $umur) {
        $now = Carbon::now();
        $tahun = $now->year;
        $year = date('Y', strtotime($tgl));
        $selisih = $tahun - $year;
        return $umur + $selisih;
    }

    public function checkStatus($status) {
        if ($status == null) {
            return 'Active';
        }
        return $status;
    }
}
