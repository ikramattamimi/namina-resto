<x-admin-layout headerTitle="Tambah Data Pengguna">

    <x-card title="Data Pengguna">
        <x-form action="{{ route('kelolaPengguna.store') }}" method="POST">
            <x-input name="nama" type="text" />
            <x-input name="username" type="text" />
            <x-input name="password" type="text" />
            <x-select class="" name="roleId" label="Role">
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">
                    {{ $role->nama }}
                </option>
                @endforeach
            </x-select>
        </x-form>
    </x-card>

    </x-admin-layot>