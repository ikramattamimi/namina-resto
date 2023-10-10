<div class="single-product-item col-12 mb-5 rounded-xl">
    <h4>Data Pemesan</h4>
    <form id="customer-form" action="{{ route('customer.order') }}" method="post">
        @csrf
        <div class="row mb-150">
            <div class="col-md-6 col-12 form-group">
                <label for="customer-name">Nama <span class="text-danger">*</span></label>
                <input class="form-control @error('customer-name') is-invalid @enderror"
                    id="customer-name" name="customer-name" type="text"
                    value="{{ old('customer-name') ?? ($customerName ?? '') }}"
                    aria-describedby="helpId" required placeholder="Nama lengkap anda">
                @error('customer-name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-phone">No Whatsapp</label>
                <input class="form-control @error('customer-phone') is-invalid @enderror w-100"
                    id="customer-phone" name="customer-phone" type="number"
                    value="{{ old('customer-phone') ?? ($customerPhone ?? '') }}"
                    aria-describedby="helpId" placeholder="Contoh: 081244820123">
                @error('customer-phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-table">No Meja</label>
                <input class="form-control @error('customer-table') is-invalid @enderror w-100"
                    id="customer-table" name="customer-table" type="number"
                    value="{{ old('customer-table') ?? ($customerTable ?? '') }}"
                    aria-describedby="helpId" placeholder="Nomor meja anda">
                @error('customer-table')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 col-12 form-group">
                <label for="customer-birthday">Tanggal Lahir</label>
                <input class="form-control @error('customer-birthday') is-invalid @enderror w-100"
                    id="customer-birthday" name="customer-birthday" type="date"
                    value="{{ old('customer-birthday') ?? ($customerBirthday ?? '') }}"
                    aria-describedby="helpId" placeholder="Nomor meja anda">
                @error('customer-birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 mb-5 form-group">
                <label for="customer-address">Alamat</label>
                <textarea class="form-control @error('customer-address') is-invalid @enderror" id="customer-address"
                    name="customer-address" cols="30" rows="5"
                    placeholder="Tambahkan pesan atau catatan khusus untuk pembelian"
                    >{{ old('customer-address') ?? ($customerAddress ?? '') }}</textarea>
                @error('customer-address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 mb-5 form-group">
                <label for="customer-message">Pesan untuk Penjual</label>
                <textarea class="form-control @error('customer-message') is-invalid @enderror" id="customer-message"
                    name="customer-message" cols="30" rows="5"
                    placeholder="Tambahkan pesan atau catatan khusus untuk pembelian"
                    >{{ old('customer-message') }}</textarea>
                @error('customer-message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12 mt-2">
                <button class="btn boxed-btn w-100" type="submit"
                    {{ \Cart::isEmpty() ? 'disabled' : '' }}>
                    Order Sekarang
                </button>
            </div>
        </div>
    </form>
</div>
