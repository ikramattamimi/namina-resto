<x-admin-layout headerTitle="Tambah Data Pengguna">

    <x-card title="Data Pengguna">
        <x-form action="{{ route('kelolaPengguna.store') }}" method="POST">
            <x-input name="nama" type="text" />
            <x-input name="username" type="text" />
            <x-input name="password" type="text" />
            <label class="col-md-3 col-form-label text-md-end">Role</label>
            <select name="roleId" id="rekeningId">
                <option value="">-- Select --</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->nama }}</option>
                @endforeach
            </select>
        </x-form>
    </x-card>

    </x-admin-layot>
