<x-customer-layout>

    <!-- hero area -->
    <div style="background-color: #051922; width:100%; height:100px;">
    </div>
    <!-- end hero area -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- cart -->
    <div class="cart-section my-3">
        <div class="container">
            <div class="col-12 text-center mt-4 mb-5">
                <h3>Orderan Saya</h3>
            </div>

            <x-product-list :products="$cartItems">

            </x-product-list>

            <div class="row mx-auto my-auto">
                <div class="single-product-item col-12 mb-3 mt-5 rounded-xl">
                    <h4>Total Pesanan</h4>
                    <p class="text">Total Harga &nbsp; : Rp {{ number_format(Cart::getSubTotal()) }}</p>
                </div>

                @include('customer.cart.customer-form')
            </div>
        </div>
        <!-- end cart -->
</x-customer-layout>
