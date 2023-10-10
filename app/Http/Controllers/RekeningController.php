<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRekeningRequest;
use App\Http\Requests\UpdateRekeningRequest;
use App\Models\BahanBaku;
use App\Models\Rekening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
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
        return view('rekening.index', [
            'rekenings' => Rekening::all(['id', 'nama', 'saldo']),
            'bahanBaku' => BahanBaku::sum(DB::raw('harga_beli * stok'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRekeningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekeningRequest $request)
    {
        $rekening = Rekening::create([
            'nama' => $request->nama,
            // 'nomor' => $request->nomor,
            'saldo' => $request->saldo,
        ]);

        return $this->redirectRoute($rekening);
    }

    // TODO : Buat History penambahan dan pengurangan saldo per rekening
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
        return view('rekening.edit', [
            'rekening' => Rekening::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekeningRequest  $request
     * @param  \App\Models\Rekening $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekeningRequest $request, Rekening $rekening)
    {
        $rekening->update([
            'nama' => $request->nama,
            // 'nomor' => $request->nomor,
            'saldo' => $request->saldo,
        ]);

        return $this->redirectRoute($rekening);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        $rekening->delete();

        return $this->redirectRoute($rekening);
    }

    /**
     * Redirect route based on condition.
     *
     * @param  \App\Models\Rekening $rekening
     * @param  String $route
     * @param  String $successMsg
     * @param  String $errorMsg
     * @return RedirectResponse
     */
    private function redirectRoute(
        Rekening $rekening,
        String $route = 'rekening.index',
        String $successMsg = 'Berhasil',
        String $errorMsg = 'Terjadi Kesalahan'
    ): RedirectResponse {
        if ($rekening) {
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
