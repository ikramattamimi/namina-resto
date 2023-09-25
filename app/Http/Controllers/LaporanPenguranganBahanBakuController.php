<?php

namespace App\Http\Controllers;

use App\Exports\PenguranganBahanBakuExport;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPenguranganBahanBakuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.penguranganBahanBaku.index', [
            'bahanBakus' => BahanBaku::all()->where('is_active', true),
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
        $tgl_dari = $request->tgl_dari;
        $tgl_sampai = $request->tgl_sampai;
        $bahan_baku = $request->bahan_baku;

        return Excel::download(new PenguranganBahanBakuExport($tgl_dari, $tgl_sampai, $bahan_baku), 'pengurangan_bahan_baku.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
