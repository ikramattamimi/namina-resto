<!-- produk section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <h3>Produk</h3>

        <div class="row mx-auto my-auto">
            @foreach ($produks as $produk)
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <img class="img-fluid img-thumbnail" src="{{ asset('img/namina-resto.jpg') }}" />
                                </div>
                                <div class="col-7">
                                    <h5 class="card-title text-truncate">{{ $produk->nama }}</h5>
                                    <p>Rp {{ number_format($produk->harga_jual) }}</p>
                                    
                                    <form action="{{ route('cart.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $produk->id }}">
                                        <input name="name" type="hidden" value="{{ $produk->nama }}">
                                        <input name="price" type="hidden" value="{{ $produk->harga_jual }}">
                                        <input name="quantity" type="hidden" value="1">
                                        <button class="cart-btn btn-sm">
                                            <i class="fas fa-shopping-cart"></i>
                                            Beli
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end kategori section -->
