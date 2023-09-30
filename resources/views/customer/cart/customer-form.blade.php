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
                <label for="customer-table">No Meja</label>
                <input class="form-control w-100" id="" name="customer-table" type="number"
                    value="{{ $customerTable ?? '' }}" aria-describedby="helpId" placeholder="Nomor meja anda">
            </div>
            <div class="col-12 mb-5 form-group">
                <label for="customer-message">Pesan untuk Penjual</label>
                <textarea class="form-control" id="" name="customer-message" cols="30" rows="5"
                    placeholder="Tambahkan pesan atau catatan khusus untuk pembelian"></textarea>
            </div>

            <div class="col-12 mt-2">
                <button class="btn boxed-btn w-100" type="submit" {{ \Cart::isEmpty() ? 'disabled' : '' }}>
                    Order Sekarang
                </button>
            </div>
        </div>
    </form>
</div>
