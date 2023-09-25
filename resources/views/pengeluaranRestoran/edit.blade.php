<x-admin-layout headerTitle="Edit Data Pengeluaran Restoran">

    <x-card title="Data Pengeluaran Restoran">
        <x-form action="{{ route('pengeluaranRestoran.update') }}" method="PUT">
            <x-input name="nama" type="text" label="Nama Pengeluaran"/>
            <x-input name="jumlah" type="number" />
            <x-input name="tanggal" type="date" />
            <label class="col-md-4 col-form-label text-md-end">rekening</label>
            <select name="rekeningId" id="rekeningId">
                <option value="">-- Select --</option>
                @foreach($rekenings as $rekening)
                <option value="{{ $rekening->id }}">{{ $rekening->nama }}</option>
                @endforeach
            </select>
        </x-form>
    </x-card>

    </x-admin-layot>