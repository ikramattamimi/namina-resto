<?php

namespace App\Http\Controllers;

use App\Events\StatusLiked;
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
        $kategoris = KategoriProduk::all();
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
        $customerTable = $request->input('customer-table');
        $customerBirthday = $request->input('customer-birthday');

        // create cookies
        Cookie::queue(Cookie::make('customer-name', $customerName, 525600 * 5));
        Cookie::queue(Cookie::make('customer-phone', $customerPhone, 525600 * 5));
        Cookie::queue(Cookie::make('customer-address', $customerAddress, 525600 * 5));
        Cookie::queue(Cookie::make('customer-table', $customerTable, 5));
        Cookie::queue(Cookie::make('customer-birthday', $customerBirthday, 525600 * 5));

        // update or add customer
        $customer = Pelanggan::create(
            [
                'nama' => $customerName,
                'no_hp' => $customerPhone,
                'alamat' => $customerAddress,
                'tanggal_lahir' => $customerBirthday,
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

        if ($pesanan) {
            event(new StatusLiked($pesanan->kode, $pesanan->pelanggan->nama));
        }

        // redirect to customer view if success
        if ($pesanan) {
            return redirect()
                ->route('customer.index')
                ->with('success', "Terima kasih $customerName, pesanan anda akan segera kami proses.");
        } else {
            return redirect()
                ->back()
                ->with('error', "Maaf $customerName, pesanan anda gagal diproses.");
        }
    }

    public function contact()
    {
        return view('customer.contact');
    }
}
