<x-admin-layout headerTitle="Ubah Data Produk">

    @php
        $route = route('produk.store');
    @endphp

    <x-card title="Data Produk">
        <x-form action="{{ $route }}" method="POST">
            <div class="row justify-content-around">
                <div class="col-lg-4 mb-3">
                    <div class="text-center">
                        <img class="img-fluid rounded mb-3" src="{{ asset('img/camera.jpg') }}" alt="">
                    </div>
                    <x-input class="" name="gambar" type="file" label="" />
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <x-input class="" name="kode" type="text"
                            value="{{ $produk->kode ?? (old('kode') ?? '') }}" />
                        <x-input class="" name="nama" type="text"
                            value="{{ $produk->nama ?? (old('nama') ?? '') }}" />
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
                            value="{{ $produk->harga_jual ?? (old('harga_jual') ?? '') }}" label="Harga Jual" />
                        <x-input class="" name="stok" type="number"
                            value="{{ $produk->stok ?? (old('stok') ?? '') }}" />
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
