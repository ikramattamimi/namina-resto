<!-- Modal -->
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input name="id" type="hidden" value="{{ $produk->id }}">
    <input name="name" type="hidden" value="{{ $produk->nama }}">
    <input name="price" type="hidden" value="{{ $produk->harga_jual }}">

    <div class="modal fade" id="addProduct-{{ $produk->id }}" role="dialog" aria-labelledby="{{ $produk->nama }}"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog" role="document">
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
                            <h5 class="card-title">{{ $produk->nama }}</h5>
                            <p class="mb-2 text">
                                Rp {{ number_format($produk->harga_jual) }}
                            </p>
                            <input class="px-3 text-center bg-gray-300" name="quantity" type="number" value="1"
                                min="1" placeholder="1" />
                            @php
                                $message = \Cart::get($produk->id)['attributes']['message'] ?? '';
                                $placeholder = 'Tulis pesan untuk penjual (opsional)';
                            @endphp
                            <textarea class="form-control" id="" name="message" rows="3" placeholder="{{ $placeholder }}">{{ $message }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="bordered-btn text-dark" data-dismiss="modal" type="button">Batal</button>
                    <button class="btn boxed-btn">
                        <i class="fas fa-shopping-cart"></i>
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
