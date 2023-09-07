<x-admin-layout headerTitle="Ubah Data Pelanggan">

    <x-card title="Data Pelanggan">
        <x-form action="{{ route('pelanggan.update', $pelanggan) }}" method="PUT">
            <x-input name="nama" type="text" value="{{ $pelanggan->nama }}" />
            <x-input name="noTelepon" type="number" value="{{ $pelanggan->no_hp }}" label="No Telepon" />
        </x-form>
    </x-card>

    </x-admin-layot>
