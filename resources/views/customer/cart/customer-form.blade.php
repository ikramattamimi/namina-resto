<div class="single-product-item col-12 mb-5 rounded-xl">
    <h4>Data Pemesan</h4>
    <form action="{{ route('customer.order') }}" method="post">
        @csrf
        <div class="row mb-150">
            <div class="col-md-6 col-12 form-group">
                <label for="customer-name">Nama <span class="text-danger">*</span></label>
                <input class="form-control" id="" name="customer-name" type="text"
                    value="{{ $customerName ?? '' }}" aria-describedby="helpId" required
                    placeholder="Nama lengkap anda">
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-phone">No Whatsapp <span class="text-danger">*</span></label>
                <input class="form-control w-100" id="" name="customer-phone" type="number"
                    value="{{ $customerPhone ?? '' }}" aria-describedby="helpId" required
                    placeholder="Contoh: 081244820123">
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-payment">Pilih metode Pembayaran <span class="text-danger">*</span></label>
                <select class="form-control" id="" name="customer-payment" required>
                    <option value="" selected>Pilih</option>
                    <option value="1">Cash</option>
                    <option value="2">Transfer</option>
                </select>
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-delivery">Pilih Pengiriman <span class="text-danger">*</span></label>
                <select class="form-control" id="" name="customer-delivery" required>
                    <option value="" selected>Pilih</option>
                    <option value="1">Ambil di Tempat GRATIS</option>
                    <option value="2">
                        Pengiriman Cepat (GoSend, GrabExpress dll) dihitung kemudian
                    </option>
                </select>
            </div>
            <div class="col-12 form-group">
                <label for="customer-address">Alamat Anda <span class="text-danger">*</span></label>
                <textarea class="form-control" id="" name="customer-address" cols="30" rows="5"
                    placeholder="Jl, RT, RW, Desa, Kota" required>{{ $customerAddress ?? '' }}</textarea>
            </div>
            <div class="col-12 mb-5 form-group">
                <label for="customer-message">Pesan untuk Penjual</label>
                <textarea class="form-control" id="" name="customer-message" cols="30" rows="5"
                    placeholder="Tambahkan pesan atau catatan khusus untuk pembelian"></textarea>
            </div>

            <div class="col-12 mt-2">
                <button class="btn boxed-btn w-100" type="submit">Order Sekarang</button>
            </div>
        </div>
    </form>
</div>
