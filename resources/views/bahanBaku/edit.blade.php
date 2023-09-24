<x-admin-layout headerTitle="Ubah Data Bahan Baku">

    <x-card title="Data Bahan Baku">
        <x-form action="{{ route('bahanBaku.update', $bahanBaku) }}" method="PUT">
            <x-input name="nama" type="text" value="{{ $bahanBaku->nama }}" />
            <x-input name="deskripsi" type="text" value="{{ $bahanBaku->deskripsi }}"/>
            <x-input name="hargaBeli" type="number" value="{{ $bahanBaku->harga_beli }}" label="Harga Beli"/>
            <x-input name="stok" type="number" value="{{ $bahanBaku->stok }}"/>
            <x-input name="minimalStok" type="number" value="{{ $bahanBaku->minimal_stok }}" label="Minimal Stok"/>
            <x-input name="satuan" type="text" value="{{ $bahanBaku->satuan }}"/>
        </x-form>
    </x-card>

    </x-admin-layot>
