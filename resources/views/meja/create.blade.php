<x-admin-layout headerTitle="Tambah Jumlah Meja">

    <x-card title="Jumlah Meja">
        <x-form action="{{ route('meja.store') }}">
            <x-input name="jumlah" type="number" />
        </x-form>
    </x-card>

</x-admin-layout>
