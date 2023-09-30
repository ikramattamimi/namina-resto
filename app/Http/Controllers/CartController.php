<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartList()
    {
        $customerName = Cookie::get('customer-name');
        $customerPhone = Cookie::get('customer-phone');
        $customerAddress = Cookie::get('customer-address');
        $customerTable = Cookie::get('no_meja');
        $cartItems = \Cart::getContent();

        // dd($customerName);
        return view(
            'customer.cart.index',
            compact('cartItems', 'customerName', 'customerPhone', 'customerAddress', 'customerTable')
        );
    }


    public function addToCart(Request $request)
    {
        $produk = Produk::find($request->id);
        $isAddedToCart = \Cart::get($request->id);


        if (!$isAddedToCart) {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'message' => $request->message,
                ],
                'associatedModel' => $produk
            ]);
        } else {
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                    'attributes' => [
                        'message' => $request->message,
                    ],
                ]
            );
        }

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('customer-view');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
