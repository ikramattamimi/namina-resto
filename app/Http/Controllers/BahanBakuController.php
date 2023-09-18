<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBahanBakuRequest;
use App\Models\BahanBaku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
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
        return view('bahanBaku.index', [
            'bahanBakus' => BahanBaku::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahanBaku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBahanBakuRequest $request): RedirectResponse
    {
        $bahanBaku = BahanBaku::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga_beli' => $request->hargaBeli,
            'stok' => $request->stok,
            'minimal_stok' => $request->minimalStok,
            'satuan' => $request->satuan
        ]);

        return $this->redirectRoute(bahanBaku: $bahanBaku);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(BahanBaku $bahanBaku)
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
        return view('bahanBaku.edit', [
            "bahanBaku" => BahanBaku::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanBakuRequest  $request
     * @param  \App\Models\BahanBaku  $bahanBaku
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    // {
    //     $pelanggan->update([
    //         'nama' => $request->nama,
    //         'no_hp' => $request->noTelepon
    //     ]);

    //     return $this->redirectRoute(pelanggan: $pelanggan);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->delete();

        return $this->redirectRoute(bahanBaku: $bahanBaku);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  mixed $bahanBaku
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        BahanBaku $bahanBaku,
        String $route = 'bahanBaku.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($bahanBaku) {
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
