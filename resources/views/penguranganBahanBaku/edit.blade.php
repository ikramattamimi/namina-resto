<x-admin-layout headerTitle="Edit Data Pengurangan Bahan Baku">

    <x-card title="Data Pengurangan Bahan Baku">
        <x-form action="{{ route('penguranganBahanBaku.update', $penguranganBahanBaku) }}" method="PUT">
            <x-input disabled  name="bahanBakuId" label="Bahan Baku" type="text" value="{{ $penguranganBahanBaku->bahan_baku->nama }}" />
            <x-input name="jumlah" type="number" value="{{ $penguranganBahanBaku->jumlah }}" />
            <x-input name="tanggal" type="date" value="{{ $penguranganBahanBaku->tanggal }}" />
        </x-form>
    </x-card>

    </x-admin-layot>