<x-admin-layout headerTitle="Tambah Data BahanBaku">

    <x-card title="Data Bahan Baku">
        <x-form action="{{ route('pembelianBahanBaku.store') }}" method="POST">
            <x-select class="" name="bahanBakuId" label="Bahan Baku">
                <option value="">Pilih Bahan Baku</option>
                @foreach ($bahanBakus as $bahanBaku)
                <option value="{{ $bahanBaku->id }}">
                    {{ $bahanBaku->nama }}
                </option>
                @endforeach
            </x-select>
            <x-input name="jumlah" type="number" />
            <x-input name="tanggal" type="date" />
        </x-form>
    </x-card>

    </x-admin-layot>