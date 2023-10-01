<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriProdukRequest;
use App\Models\KategoriDapur;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = KategoriProduk::orderBy('nama', 'asc')->get();
        return view('produk.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dapurs = KategoriDapur::all();
        return view('produk.kategori.create', compact('dapurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKategoriProdukRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            // get original filename
            $filename = $request->file('gambar')->getClientOriginalName();
            // store image to storage with original name
            $request->file('gambar')->storeAs('public/gambar-kategori', $filename);
            // set filename to database
            $data['gambar'] = $filename;
        }

        $kategori = KategoriProduk::create($data);

        if ($kategori) {
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal ditambahkan');
        }
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
    public function edit(KategoriProduk $kategori)
    {
        $dapurs = KategoriDapur::all();
        return view('produk.kategori.edit', compact('kategori', 'dapurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateKategoriProdukRequest $request, KategoriProduk $kategori)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            // get original filename
            $filename = $request->file('gambar')->getClientOriginalName();
            // store image to storage with original name
            $request->file('gambar')->storeAs('public/gambar-kategori', $filename);
            // set filename to database
            $data['gambar'] = $filename;

            // delete old image
            $oldImage = KategoriProduk::find($kategori->id)->gambar;
            if ($oldImage) {
                // unlink(storage_path('app/public/gambar-kategori/' . $oldImage));
            }
        }

        $product = KategoriProduk::find($kategori->id)->update($data);

        if ($product) {
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategori)
    {
        // delete image
        $oldImage = $kategori->gambar;
        if ($oldImage) {
            unlink(storage_path('app/public/gambar-kategori/' . $oldImage));
        }

        $product = $kategori->delete();

        if ($product) {
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal dihapus');
        }
    }
}
