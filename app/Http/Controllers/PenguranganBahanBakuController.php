<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembelianBahanBakuRequest;
use App\Http\Requests\UpdatePembelianBahanBakuRequest;
use App\Models\BahanBaku;
use App\Models\PenguranganBahanBaku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenguranganBahanBakuController extends Controller
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
        return view('penguranganBahanBaku.index', [
            'penguranganBahanBakus' => PenguranganBahanBaku::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penguranganBahanBaku.create', [
            'bahanBakus' => BahanBaku::all()->where('is_active',true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PembelianBahanBakuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembelianBahanBakuRequest $request): RedirectResponse
    {
        $penguranganBahanBaku = PenguranganBahanBaku::create([
            'bahan_baku_id' => $request->bahanBakuId,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'nama_staff_gudang' => Auth::user()->nama,
        ]);

        $bahanBaku = BahanBaku::find($request->bahanBakuId);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok - $request->jumlah
        ]);

        return $this->redirectRoute(penguranganBahanBaku: $penguranganBahanBaku);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenguranganBahanBaku  $penguranganBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(PenguranganBahanBaku $penguranganBahanBaku)
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
        return view('penguranganBahanBaku.edit', [
            "penguranganBahanBaku" => PenguranganBahanBaku::find($id),
            'bahanBakus' => BahanBaku::all()->where('is_active',true),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PenguranganBahanBakuRequest  $request
     * @param  \App\Models\PenguranganBahanBaku  $penguranganBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianBahanBakuRequest $request, PenguranganBahanBaku $penguranganBahanBaku)
    {
        $bahanBaku = BahanBaku::find($penguranganBahanBaku->bahan_baku_id);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok + $penguranganBahanBaku->jumlah
        ]);

        $penguranganBahanBaku->update([
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'nama_staff_gudang' => Auth::user()->nama,
        ]);

        $bahanBaku->update([
            'stok' => $bahanBaku->stok - $request->jumlah
        ]);

        return $this->redirectRoute(penguranganBahanBaku: $penguranganBahanBaku);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penguranganBahanBaku = PenguranganBahanBaku::findOrFail($id);
        $bahanBaku = BahanBaku::find($penguranganBahanBaku->bahan_baku_id);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok + $penguranganBahanBaku->jumlah
        ]);
        $penguranganBahanBaku->delete();

        return $this->redirectRoute(penguranganBahanBaku: $penguranganBahanBaku);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  mixed $penguranganBahanBaku
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        PenguranganBahanBaku $penguranganBahanBaku,
        String $route = 'penguranganBahanBaku.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($penguranganBahanBaku) {
            return redirect()
                ->route($route)
                ->with([
                    "success" => $successMsg
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "error" => $errorMsg
                ]);
        }
    }
}
