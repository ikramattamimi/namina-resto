<!-- product section -->
<div class="product-section mt-5" id="{{ $title }}">
    <div class="container">
        @isset($title)
            <h3>{{ $title }}</h3>
        @endisset

        <div class="row mx-auto my-auto">
            @foreach ($products as $product)
                @php
                    $cart = \Cart::get($product->id);
                @endphp

                <div class=" col-lg-6 col-12 mb-3 rounded-xl px-2">
                    <div class="single-product-item">
                        <div class="row align-items-center justify-content-between">
                            {{-- image --}}
                            <div class="col-4 mb-3">
                                <img class="rounded img-fluid"
                                    src="{{ asset('storage/gambar-produk/' . $product->gambar) }}" />
                            </div>
                            {{-- texts --}}
                            <div class="col-8">
                                {{-- name, quantity --}}
                                <div class="row mb-2 align-items-center">
                                    <div class="col-9">
                                        <h5 class="card-title text-truncate text-uppercase">
                                            {{ $cart->name ?? $product->nama }}
                                        </h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex justify-content-end">
                                            @isset($cart)
                                                <p class="text-danger font-weight-bold text">
                                                    {{ $cart->quantity }} x
                                                </p>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                {{-- price, button --}}
                                <div class="row align-items-start">
                                    <div class="col-sm-7 col-7">
                                        <p class="mb-2 text">
                                            Rp {{ number_format($cart->price ?? $product->harga_jual) }}
                                        </p>
                                        @if (request()->is('cart'))
                                            <div class="d-flex">
                                                <!-- Button trigger modal -->
                                                <button class="btn p-0" data-toggle="modal"
                                                    data-target="#addProduct-{{ $cart->id }}" type="button">
                                                    <i class="fas fa-edit text-primary text"></i>
                                                </button>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input name="id" type="hidden" value="{{ $cart->id }}">
                                                    <button class="btn btn-lg" onclick="confirm('Apakah anda yakin?')">
                                                        <i class="fas fa-trash text-danger text"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif

                                    </div>
                                    @if (!request()->is('cart'))
                                        <div class="col-sm-5 col-5">
                                            <div class="d-flex justify-content-end align-items-center">
                                                <!-- Button trigger modal -->
                                                <button class="btn cart-btn" data-toggle="modal"
                                                    data-target="#addProduct-{{ $product->id }}" type="button">
                                                    <i class="fas fa-shopping-cart"></i>Beli
                                                </button>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-product-modal :product="$product" />
            @endforeach
        </div>
    </div>
</div>
<!-- end product section -->
