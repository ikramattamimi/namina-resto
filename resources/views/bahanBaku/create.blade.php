<x-admin-layout headerTitle="Tambah Data BahanBaku">

    <x-card title="Data Bahan Baku">
        <x-form action="{{ route('bahanBaku.store') }}" method="POST">
            <x-input name="nama" type="text" />
            <x-input name="deskripsi" type="text" />
            <x-input name="hargaBeli" type="number" label="Harga Beli"/>
            <x-input name="stok" type="number" />
            <x-input name="minimalStok" type="number" label="Minimal Stok"/>
            <x-input name="satuan" type="text" :isRequired="null" />
        </x-form>
    </x-card>

    </x-admin-layot>
