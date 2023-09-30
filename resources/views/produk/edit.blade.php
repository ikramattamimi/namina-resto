<x-admin-layout headerTitle="Ubah Data Produk">

    <x-card title="Data Produk">
        <x-form action="{{ route('produk.update', $produk) }}" method="PUT">
            <div class="row justify-content-around">
                <div class="col-lg-4 mb-3">
                    <div class="text-center">
                        <img class="img-fluid rounded mb-3" src="{{ asset('img/namina-resto.jpg') }}" alt="">
                    </div>
                    <x-input class="" name="gambar" type="file" value="{{ $produk->gambar }}" label=""
                        :isRequired="false" />
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <x-input class="" name="kode" type="text" value="{{ $produk->kode }}" />
                        <x-input class="" name="nama" type="text" value="{{ $produk->nama }}" />
                        <x-select class="" name="kategori_produk_id" label="Kategori Produk">
                            @foreach ($kategoriProduks as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $kategori->id == $produk->kategori_produk_id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input class="" name="Harga Jual" type="text" value="{{ $produk->harga_jual }}" />
                        <x-input class="" name="Stok" type="text" value="{{ $produk->stok }}" />
                    </div>
                </div>
            </div>
        </x-form>

    </x-card>

    </x-admin-layot>
