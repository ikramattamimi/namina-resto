<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerOrderRequest;
use App\Models\KategoriProduk;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = KategoriProduk::all();
        $produks = Produk::all();
        $cartItems = \Cart::getContent();

        return view('customer.index', compact('kategoris', 'produks', 'cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(CustomerOrderRequest $request)
    {
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
            ]
        );

        // dd($customerName);

        return redirect()
            ->route('customer-view')
            ->with('success', "Terima kasih $customerName, pesanan anda akan segera kami proses.");
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
