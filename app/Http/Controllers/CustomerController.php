<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use App\Models\KategoriProduk;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\ProdukDipesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategoris = KategoriProduk::paginate(4);
        $produks = Produk::all();
        $cartItems = \Cart::getContent();

        if (isset($request->no_meja)) {
            $noMeja = $request->no_meja;
            Cookie::queue(Cookie::make('customer-table', $noMeja, 60 * 3));
        }

        return view('customer.product.index', compact('kategoris', 'produks', 'cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(CustomerOrderRequest $request)
    {
        // get customer data
        $customerName = $request->input('customer-name');
        $customerPhone = $request->input('customer-phone');
        $customerAddress = $request->input('customer-address');

        // create cookies
        Cookie::queue(Cookie::make('customer-name', $customerName, 525600 * 5));
        Cookie::queue(Cookie::make('customer-phone', $customerPhone, 525600 * 5));
        Cookie::queue(Cookie::make('customer-address', $customerAddress, 525600 * 5));

        // update or add customer
        $customer = Pelanggan::updateOrCreate(
            ['no_hp' => $customerPhone],
            [
                'nama' => $customerName,
                'alamat' => $customerAddress,
            ]
        );

        // create order
        $pesanan = Pesanan::create([
            'id_pelanggan' => $customer->id,
            'status_pesanan_id' => 1,
            'kode' => 'PSN-' . time(),
            'catatan' => $request->input('customer-message'),
            'no_meja' => $request->input('customer-table'),
        ]);

        // get order items
        $products = \Cart::getContent();

        // create order items
        foreach ($products as $product) {
            ProdukDipesan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $product->id,
                'qty' => $product->quantity,
                'catatan' => $product->attributes->message,
                'harga' => $product->price,
            ]);
        }

        // clear cart
        \Cart::clear();

        // redirect to customer view if success
        if ($pesanan) {
            return redirect()
                ->route('customer-view')
                ->with('success', "Terima kasih $customerName, pesanan anda akan segera kami proses.");
        } else {
            return redirect()
                ->back()
                ->with('error', "Maaf $customerName, pesanan anda gagal diproses.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
