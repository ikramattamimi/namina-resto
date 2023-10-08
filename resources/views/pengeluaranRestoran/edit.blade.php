<x-admin-layout headerTitle="Edit Data Pengeluaran Restoran">

    <x-card title="Data Pengeluaran Restoran">
        <x-form action="{{ route('pengeluaranRestoran.update', $pengeluaranRestoran) }}" method="PUT">
            <x-input name="nama" type="text" label="Nama Pengeluaran" value="{{ $pengeluaranRestoran->nama }}"/>
            <x-input name="jumlah" type="number" value="{{ $pengeluaranRestoran->jumlah }}"/>
            <x-input name="tanggal" type="date" />
            <x-select class="" name="rekeningId" label="Rekening">
            <option value=" {{ $pengeluaranRestoran->rekening_id }} ">{{ $pengeluaranRestoran->rekening->nama }}</option>
                @foreach ($rekenings as $rekening)
                <option value="{{ $rekening->id }}">
                    {{ $rekening->nama }}
                </option>
                @endforeach
            </x-select>
        </x-form>
    </x-card>

    </x-admin-layot>