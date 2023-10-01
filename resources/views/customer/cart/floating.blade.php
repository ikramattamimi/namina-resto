<div class="container-fluid fixed-bottom bg-light py-2 rounded-lg rounded-top"
    style="box-shadow: 0 5px 15px 5px rgba(0, 0, 0, 0.2)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-1 col-2">
                <i class="fas fa-shopping-cart" style="font-size: 1.8rem"></i>
            </div>
            <div class="col-sm-9 col-8">
                <p class="text m-0">Total Belanja</p>
                <p class="text m-0 text-danger">Rp {{ number_format(\Cart::getSubTotal()) }}</p>
            </div>
            <div class="col-sm-2 col-2 d-flex justify-content-end">
                <a class="boxed-btn" href="{{ route('cart.list') }}">
                    Lanjut
                </a>
            </div>
        </div>
    </div>
</div>
