@php
    $cart = \Cart::get($product->id);
    $message = $cart['attributes']['message'] ?? '';
    $placeholder = 'Tulis pesan untuk penjual (opsional)';
@endphp

<!-- Modal -->
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input name="id" type="hidden" value="{{ $product->id }}">
    <input name="name" type="hidden" value="{{ $product->nama ?? '' }}">
    <input name="price" type="hidden" value="{{ $product->harga_jual ?? '' }}">

    <div class="modal fade" id="addProduct-{{ $product->id }}" role="dialog"
        aria-labelledby="{{ $cart->name ?? ($product->nama ?? '') }}" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah ke keranjang</h5>
                    <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="text-center">
                            <img class="rounded img-thumbnail" src="{{ asset('img/namina-resto.jpg') }}" />
                            <h5 class="card-title">{{ $cart->name ?? ($product->nama ?? '') }}</h5>
                            <p class="mb-2 text">
                                Rp {{ number_format($cart->price ?? ($product->harga_jual ?? 0)) }}
                            </p>
                            <input class="px-3 text-center bg-gray-300" name="quantity" type="number"
                                value="{{ $cart->quantity ?? 1 }}" min="1" placeholder="1" />
                            <textarea class="form-control" id="" name="message" rows="3" placeholder="{{ $placeholder }}">{{ $message }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="bordered-btn text-dark" data-dismiss="modal" type="button">Batal</button>
                    <button class="btn boxed-btn">
                        <i class="fas fa-shopping-cart"></i>
                        Beli
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
