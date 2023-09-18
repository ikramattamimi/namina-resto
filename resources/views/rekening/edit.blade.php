<x-admin-layout headerTitle="Ubah Data Rekening">

    <x-card title="Data Rekening">
        <x-form action="{{ route('rekening.update', $rekening) }}" method="PUT">
            <x-input name="nama" type="text" value="{{ $rekening->nama }}" />
            <x-input name="nomor" type="number" value="{{ $rekening->nomor }}" label="No Rekening" />
            <x-input name="saldo" type="number" value="{{ $rekening->saldo }}" label="Saldo" />
        </x-form>
    </x-card>

    </x-admin-layot>
