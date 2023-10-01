<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembelianBahanBakuRequest;
use App\Http\Requests\UpdatePembelianBahanBakuRequest;
use App\Models\BahanBaku;
use App\Models\PembelianBahanBaku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianBahanBakuController extends Controller
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
        return view('pembelianBahanBaku.index', [
            'pembelianBahanBakus' => PembelianBahanBaku::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelianBahanBaku.create', [
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
        $pembelianBahanBaku = PembelianBahanBaku::create([
            'bahan_baku_id' => $request->bahanBakuId,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'nama_staff_gudang' => Auth::user()->nama,
        ]);

        $bahanBaku = BahanBaku::find($request->bahanBakuId);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok + $request->jumlah
        ]);

        return $this->redirectRoute(pembelianBahanBaku: $pembelianBahanBaku);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(PembelianBahanBaku $pembelianBahanBaku)
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
        return view('pembelianBahanBaku.edit', [
            "pembelianBahanBaku" => PembelianBahanBaku::find($id),
            'bahanBakus' => BahanBaku::all()->where('is_active',true),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PembelianBahanBakuRequest  $request
     * @param  \App\Models\PembelianBahanBaku  $pembelianBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianBahanBakuRequest $request, PembelianBahanBaku $pembelianBahanBaku)
    {
        $bahanBaku = BahanBaku::find($pembelianBahanBaku->bahan_baku_id);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok - $pembelianBahanBaku->jumlah
        ]);

        $pembelianBahanBaku->update([
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'nama_staff_gudang' => Auth::user()->nama,
        ]);

        $bahanBaku->update([
            'stok' => $bahanBaku->stok + $request->jumlah
        ]);



        return $this->redirectRoute(pembelianBahanBaku: $pembelianBahanBaku);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelianBahanBaku = PembelianBahanBaku::findOrFail($id);
        $bahanBaku = BahanBaku::find($pembelianBahanBaku->bahan_baku_id);
        $bahanBaku->update([
            'stok' => $bahanBaku->stok - $pembelianBahanBaku->jumlah
        ]);
        $pembelianBahanBaku->delete();

        return $this->redirectRoute(pembelianBahanBaku: $pembelianBahanBaku);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  mixed $pembelianBahanBaku
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        PembelianBahanBaku $pembelianBahanBaku,
        String $route = 'pembelianBahanBaku.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($pembelianBahanBaku) {
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
