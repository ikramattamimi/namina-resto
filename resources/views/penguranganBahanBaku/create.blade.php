<x-admin-layout headerTitle="Tambah Data Pengurangan Bahan Baku">

    <x-card title="Data Pengurangan Bahan Baku">
        <x-form action="{{ route('penguranganBahanBaku.store') }}" method="POST">
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