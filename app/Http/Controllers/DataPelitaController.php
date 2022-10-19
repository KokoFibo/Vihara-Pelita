<?php

namespace App\Http\Controllers;

use App\Models\DataPelita;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
