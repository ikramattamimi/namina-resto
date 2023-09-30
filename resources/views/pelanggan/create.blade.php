<x-admin-layout headerTitle="Tambah Data Pelanggan">

    <x-card title="Data Pelanggan">
        <x-form action="{{ route('pelanggan.store') }}" method="POST">
            <x-input name="nama" type="text" />
            <x-input name="noTelepon" type="number" label="No Telepon" />
        </x-form>
    </x-card>

    </x-admin-layot>
