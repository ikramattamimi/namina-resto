<x-admin-layout headerTitle="Tambah Data Pengeluaran Restoran">

    <x-card title="Data Pengeluaran Restoran">
        <x-form action="{{ route('pengeluaranRestoran.store') }}" method="POST">
            <x-input name="nama" type="text" label="Nama Pengeluaran" />
            <x-input name="jumlah" type="number" />
            <x-input name="tanggal" type="date" />
            <x-select class="" name="rekeningId" label="Rekening">
                <option value="">Pilih Rekening</option>
                @foreach ($rekenings as $rekening)
                <option value="{{ $rekening->id }}">
                    {{ $rekening->nama }}
                </option>
                @endforeach
            </x-select>
        </x-form>
    </x-card>

    </x-admin-layot>