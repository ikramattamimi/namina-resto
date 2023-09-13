<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meja.index', [
            'meja' => Meja::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMejaRequest  $request
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $meja->update([
            'jumlah' => $request->jumlah,
        ]);

        return $this->redirectRoute($meja);
    }

    /**
     * redirectRoute
     *
     * @return void
     */
    private function redirectRoute(
        Meja $meja,
        String $route = 'meja.index',
        String $successMessage = 'Berhasil',
        String $errorMessage = 'Terjadi Error',
    ) {
        if ($meja) {
            return redirect()
                ->route($route)
                ->with([
                    'success' => $successMessage
                ]);
        } else {
            return redirect()
                ->back()
                ->with([
                    'error' => $errorMessage
                ]);
        }
    }
}
