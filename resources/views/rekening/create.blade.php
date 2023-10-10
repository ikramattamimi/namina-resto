<x-admin-layout headerTitle="Tambah Data Rekening">

    <x-card title="Data Rekening">
        <x-form action="{{ route('rekening.store') }}" method="POST">
            <x-input name="nama" type="text" />
            <!-- <x-input name="nomor" type="number" label="No Rekening" /> -->
            <x-input name="saldo" type="number" label="Saldo" />
        </x-form>
    </x-card>

    </x-admin-layot>
