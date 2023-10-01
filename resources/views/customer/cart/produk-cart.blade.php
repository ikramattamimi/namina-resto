<!-- produk section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <h3>Produk</h3>

        <div class="row mx-auto my-auto">
            @foreach ($produks as $produk)
                <div class="single-product-item col-lg-6 col- mb-3 rounded-xl">
                    <div class="row align-items-center justify-content-between">
                        {{-- image --}}
                        <div class="col-4 mb-3">
                            <img class="rounded img-fluid" src="{{ asset('img/namina-resto.jpg') }}" />
                        </div>
                        {{-- texts --}}
                        <div class="col-8">
                            {{-- name, quantity --}}
                            <div class="row mb-2 align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title text-truncate text-uppercase">
                                        {{ $produk->nama }}
                                    </h5>
                                </div>
                                @php
                                    $quantity = \Cart::get($produk->id)->quantity ?? 0;
                                @endphp
                                <div class="col-3">
                                    <div class="d-flex justify-content-end">
                                        @if ($quantity != 0)
                                            <p class="text-danger font-weight-bold text">
                                                {{ $quantity }} x
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- price, button --}}
                            <div class="row align-items-start">
                                <div class="col-sm-7 col-7">
                                    <p class="mb-2 text">Rp {{ number_format($produk->harga_jual) }}</p>
                                </div>
                                <div class="col-sm-5 col-5">
                                    <div class="d-flex justify-content-end align-items-center">

                                        <!-- Button trigger modal -->
                                        <button class="btn cart-btn" data-toggle="modal"
                                            data-target="#addProduct-{{ $produk->id }}" type="button">
                                            <i class="fas fa-shopping-cart"></i>Beli
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('customer.add-produk-modal')
            @endforeach
        </div>
    </div>
</div>
<!-- end kategori section -->
