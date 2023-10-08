<x-admin-layout headerTitle="Edit Data Pembelian Bahan Baku">

    <x-card title="Data Pembelian Bahan Baku">
        <x-form action="{{ route('pembelianBahanBaku.update', $pembelianBahanBaku) }}" method="PUT">
            <x-input disabled  name="bahanBakuId" label="Bahan Baku" type="text" value="{{ $pembelianBahanBaku->bahan_baku->nama }}" />
            <x-input name="jumlah" type="number" value="{{ $pembelianBahanBaku->jumlah }}" />
            <x-input name="tanggal" type="date" value="{{ $pembelianBahanBaku->tanggal }}" />
            <input name="status" type="hidden" value="pending" />
        </x-form>
    </x-card>

    </x-admin-layot>