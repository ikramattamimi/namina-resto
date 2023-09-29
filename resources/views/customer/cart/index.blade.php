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

    <!-- cart -->
    <div class="cart-section my-3">
        <div class="container">
            <div class="col-12 text-center mt-4 mb-5">
                <h3>Orderan Saya</h3>
            </div>

            <div class="row mx-auto my-auto justify-content-center">
                @foreach ($cartItems as $item)
                    <div class="col-lg-6 px-3 col-11 mb-3">
                        <div class="single-product-item rounded-xl">
                            <div class="row align-items-center justify-content-between">
                                {{-- image --}}
                                <div class="col-4 mb-3">
                                    <img class="rounded img-fluid" src="{{ asset('img/namina-resto.jpg') }}" />
                                </div>
                                {{-- texts --}}
                                <div class="col-8">
                                    {{-- name, quantity --}}
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-12">
                                            <h5 class="card-title text-truncate text-uppercase">
                                                {{ $item->name }}
                                            </h5>
                                        </div>
                                    </div>
                                    {{-- price, button --}}
                                    <div class="row align-items-start">
                                        <div class="col-sm-7 col-7">
                                            <p class="mb-2 text">
                                                Rp {{ number_format($item->price) }}
                                            </p>
                                            <div class="d-flex">
                                                <!-- Button trigger modal -->
                                                <button class="btn p-0" data-toggle="modal"
                                                    data-target="#addProduct-{{ $item->id }}" type="button">
                                                    <i class="fas fa-edit text-primary text"></i>
                                                </button>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input name="id" type="hidden" value="{{ $item->id }}">
                                                    <button class="btn btn-lg" onclick="confirm('Apakah anda yakin?')">
                                                        <i class="fas fa-trash text-danger text"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-5">
                                            <div class="d-flex justify-content-end align-items-center">
                                                @php
                                                    $quantity = \Cart::get($item->id)->quantity ?? 0;
                                                @endphp
                                                @if ($quantity != 0)
                                                    <p class="text-danger font-weight-bold text">
                                                        {{ $quantity }} x
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <form action="{{ route('cart.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" type="hidden" value="{{ $item->id }}">
                            <input name="name" type="hidden" value="{{ $item->name }}">
                            <input name="price" type="hidden" value="{{ $item->price }}">

                            <div class="modal fade" id="addProduct-{{ $item->id }}" role="dialog"
                                aria-labelledby="{{ $item->name }}" aria-hidden="true" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah ke keranjang</h5>
                                            <button class="close" data-dismiss="modal" type="button"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="text-center">
                                                    <img class="rounded img-thumbnail"
                                                        src="{{ asset('img/namina-resto.jpg') }}" />
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <p class="mb-2 text">
                                                        Rp {{ number_format($item->price) }}
                                                    </p>
                                                    <input class="px-3 text-center bg-gray-300" name="quantity"
                                                        type="number" value="{{ $item->quantity ?? 1 }}"
                                                        min="1" placeholder="1" />
                                                    @php
                                                        $message = \Cart::get($item->id)['attributes']['message'] ?? '';
                                                        $placeholder = 'Tulis pesan untuk penjual (opsional)';
                                                    @endphp
                                                    <textarea class="form-control" id="" name="message" rows="3" placeholder="{{ $placeholder }}">{{ $message }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="bordered-btn text-dark" data-dismiss="modal"
                                                type="button">Batal</button>
                                            <button class="btn boxed-btn">
                                                <i class="fas fa-shopping-cart"></i>
                                                Ubah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach

                <div class="single-product-item col-12 mb-3 mt-5 rounded-xl">
                    <h4>Total Pesanan</h4>
                    <p class="text">Total Harga &nbsp; : Rp {{ number_format(Cart::getSubTotal()) }}</p>
                </div>

                @include('customer.cart.customer-form')

            </div>
        </div>
        <!-- end cart -->
</x-customer-layout>
