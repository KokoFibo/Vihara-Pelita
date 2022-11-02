<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Inertia\Inertia;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    
    public function index()
    {
        $branch = Branch::all();
        return Inertia::render('Branch/Index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return Inertia::render('Branch/Create', compact('kota'));
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
            'kota_id' => ['required'],
            'branch' => ['required', 'unique:branches,branch'],
            'kode_branch' => ['required', 'unique:branches,kode_branch'],
        ]);
        Branch::create([
            'kota_id' => $request->kota_id,
            'branch' => $request->branch,
            'kode_branch' => $request->kode_branch,
        ]);

        return redirect()->route('branch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        $kota = Kota::all();
        return Inertia::render('Branch/Edit', compact(['branch', 'kota']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kota_id' => ['required'],
            'branch' => ['required', 'unique:branches,branch'],
            'kode_branch' => ['required', 'unique:branches,kode_branch'],
        ]);
        $branch = Branch::find($id);
        $branch->kota_id = $request->kota_id;
        $branch->branch = $request->branch;
        $branch->kode_branch = $request->kode_branch;
        $branch->save();
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
