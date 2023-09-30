<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriProduks = KategoriProduk::all();
        return view('produk.create', compact('kategoriProduks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProdukRequest $request)
    {
        // store image to storage
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            // get original filename
            $filename = $request->file('gambar')->getClientOriginalName();
            // store image to storage with original name
            $request->file('gambar')->storeAs('public/gambar-produk', $filename);
            // set filename to database
            $data['gambar'] = $filename;
        }

        $product = Produk::create($data);

        if ($product) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Produk gagal ditambahkan');
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
    public function edit($id)
    {
        $kategoriProduks = KategoriProduk::all();
        $produk = Produk::find($id);
        return view('produk.edit', compact('produk', 'kategoriProduks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProdukRequest $request, Produk $produk)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            // get original filename
            $filename = $request->file('gambar')->getClientOriginalName();
            // store image to storage with original name
            $request->file('gambar')->storeAs('public/gambar-produk', $filename);
            // set filename to database
            $data['gambar'] = $filename;

            // delete old image
            $oldImage = Produk::find($produk->id)->gambar;
            if ($oldImage) {
                unlink(storage_path('app/public/gambar-produk/' . $oldImage));
            }
        }

        $product = Produk::find($produk->id)->update($data);

        if ($product) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Produk gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // delete image
        $oldImage = Produk::find($produk->id)->gambar;
        if ($oldImage) {
            unlink(storage_path('app/public/gambar-produk/' . $oldImage));
        }

        $product = Produk::find($produk->id)->delete();

        if ($product) {
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Produk gagal dihapus');
        }
    }
}
