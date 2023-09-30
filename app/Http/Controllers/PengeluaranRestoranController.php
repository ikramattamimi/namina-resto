<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengeluaranRestoranRequest;
use App\Http\Requests\UpdatePengeluaranRestoranRequest;
use App\Models\PengeluaranRestoran;
use App\Models\Rekening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranRestoranController extends Controller
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
        return view('pengeluaranRestoran.index', [
            'pengeluaranRestorans' => PengeluaranRestoran::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaranRestoran.create', [
            'rekenings' => Rekening::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengeluaranRestoranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengeluaranRestoranRequest $request): RedirectResponse
    {
        $pengeluaranRestoran = PengeluaranRestoran::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'nama_admin' => Auth::user()->nama,
            'rekening_id' => $request->rekeningId,
        ]);

        $rekening = Rekening::find($request->rekeningId);
        $rekening->update([
            'saldo' => $rekening->saldo - $request->jumlah
        ]);

        return $this->redirectRoute(pengeluaranRestoran: $pengeluaranRestoran);
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
        return view('pengeluaranRestoran.edit', [
            "pengeluaranRestoran" => PengeluaranRestoran::find($id),
            'rekenings' => Rekening::all(),
        ]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengeluaranRestoranRequest  $request
     * @param  \App\Models\PengeluaranRestoran  $ppengeluaranRestoran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengeluaranRestoranRequest $request, PengeluaranRestoran $pengeluaranRestoran)
    {
        $rekening = Rekening::find($pengeluaranRestoran->rekening_id);
        $rekening->update([
            'saldo' => $rekening->saldo + $pengeluaranRestoran->jumlah
        ]);

        $pengeluaranRestoran->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'nama_admin' => Auth::user()->nama,
            'rekening_id' => $request->rekeningId,
        ]);

        $rekening->update([
            'saldo' => $rekening->saldo - $request->jumlah
        ]);

        return $this->redirectRoute(pengeluaranRestoran: $pengeluaranRestoran);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaranRestoran = PengeluaranRestoran::findOrFail($id);
        $rekening = Rekening::find($pengeluaranRestoran->rekening_id);
        $rekening->update([
            'saldo' => $rekening->saldo + $pengeluaranRestoran->jumlah
        ]);
        $pengeluaranRestoran->delete();

        return $this->redirectRoute(pengeluaranRestoran: $pengeluaranRestoran);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  mixed $pengeluaranRestoraan
     * @param  mixed $route
     * @param  mixed $successMsg
     * @param  mixed $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        PengeluaranRestoran $pengeluaranRestoran,
        String $route = 'pengeluaranRestoran.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($pengeluaranRestoran) {
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
