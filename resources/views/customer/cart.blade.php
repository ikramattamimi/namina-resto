<x-customer-layout>

    <!-- hero area -->
    <div style="background-color: #07212e; width:100%; height:100px;">
    </div>
    <!-- end hero area -->

    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Nama</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $item->id }}">
                                                <button class="btn btn-lg">
                                                    <i class="fas fa-trash" style="color: red"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="product-image"><img src="assets/img/products/product-img-1.jpg"
                                                alt=""></td>
                                        <td class="product-name">{{ $item->name }}</td>
                                        <td class="product-price">Rp {{ number_format($item->price) }}</td>
                                        <td class="product-quantity">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $item->id }}">
                                                <div class="d-flex">
                                                    <input class="px-3 text-center bg-gray-300" name="quantity"
                                                        type="number" value="{{ $item->quantity }}" min="1" />
                                                    <button class="cart-btn btn-sm" type="submit">update</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="product-total">
                                            Rp {{ number_format(Cart::get($item->id)->getPriceSum()) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>Rp {{ number_format(Cart::getSubTotal()) }}</td>
                                </tr>
                                {{-- <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>$545</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a class="boxed-btn" href="cart.html">Update Cart</a>
                            <a class="boxed-btn black" href="checkout.html">Check Out</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
</x-customer-layout>
