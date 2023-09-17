<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;

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

        $this->createQr($meja);
        $this->createZip();

        return $this->redirectRoute($meja);
    }

    /**
     * createQr
     *
     * @param  mixed $meja
     * @return void
     */
    private function createQr(Meja $meja)
    {
        $path = public_path('storage/img/qr/');

        // Clean QR directory
        File::cleanDirectory($path);

        // Create QR codes and put them into storage
        for ($nomor = 1; $nomor <= $meja->jumlah; $nomor++) {
            QrCode::format('png')->size(300)->generate(
                'https://techvblogs.com/blog/generate-qr-code-laravel-9/' . $nomor,
                $path . 'meja_' . $nomor . '.png',
            );
        }
    }

    /**
     * Create Zip File of QR Code Images
     *
     * @return void
     */
    private function createZip()
    {
        $zip = new ZipArchive;
        $fileName = 'All.zip';

        if ($zip->open(public_path('storage/img/qr/' . $fileName), ZipArchive::CREATE) === TRUE) {
            $path = public_path('storage/img/qr/');

            $files = File::files($path);

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }
    }

    /**
     * redirectRoute
     *
     * @return void
     */
    private function redirectRoute(
        $meja,
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
