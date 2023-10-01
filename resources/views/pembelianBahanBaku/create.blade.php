<x-admin-layout headerTitle="Tambah Data BahanBaku">

    <x-card title="Data Bahan Baku">
        <x-form action="{{ route('pembelianBahanBaku.store') }}" method="POST">
            <label class="col-md-4 col-form-label text-md-end">Bahan Baku</label>
            <select name="bahanBakuId" id="bahanBakuId">
                <option value="">-- Select --</option>
                @foreach($bahanBakus as $bahanBaku)
                <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
                @endforeach
            </select>
            <x-input name="jumlah" type="number" />
            <x-input name="tanggal" type="date" />
        </x-form>
    </x-card>

    </x-admin-layot>