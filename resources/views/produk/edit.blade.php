<x-admin-layout headerTitle="Ubah Data Produk">

    @php
        $route = route('produk.update', $produk);
    @endphp

    <x-card title="Data Produk">
        <x-form action="{{ $route }}" method="PUT">
            <div class="row justify-content-around">
                <div class="col-lg-4 mb-3">
                    <div class="text-center">
                        <img class="img-fluid rounded mb-3"
                            src="{{ asset('storage/gambar-produk/' . $produk->gambar) }}"
                            alt="gambar produk">
                    </div>
                    <x-input class="" name="gambar" type="file" label=""
                        :isRequired="false" />
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <x-input class="" name="kode" type="text"
                            value="{{ old('kode') ?? ($produk->kode ?? '') }}" />
                        <x-input class="" name="nama" type="text"
                            value="{{ old('nama') ?? ($produk->nama ?? '') }}" />
                        <x-select class="" name="kategori_produk_id" label="Kategori Produk">
                            <option value="">Pilih Kategori Produk</option>
                            @foreach ($kategoriProduks as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ isset($produk) ? ($kategori->id == $produk->kategori_produk_id ? 'selected' : '') : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input class="" name="harga_jual" type="number"
                            value="{{ old('harga_jual') ?? ($produk->harga_jual ?? '') }}"
                            label="Harga Jual" />
                        <x-select class="" name="is_active" label="Status Produk">
                            <option value="">Pilih Status Produk</option>
                            <option value=1
                                {{ isset($produk) ? ($produk->is_active == 1 ? 'selected' : '') : '' }}>
                                Tersedia
                            </option>
                            <option value=0
                                {{ isset($produk) ? ($produk->is_active == 0 ? 'selected' : '') : '' }}>
                                Habis
                            </option>
                        </x-select>
                        {{-- <x-input class="" name="stok" type="number"
                            value="{{ old('stok') ?? ($produk->stok ?? '') }}" /> --}}
                    </div>
                </div>
            </div>
        </x-form>

    </x-card>

    @push('scripts')
        <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    @endpush

    </x-admin-layot>
