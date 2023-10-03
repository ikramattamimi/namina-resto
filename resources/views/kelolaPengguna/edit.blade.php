<x-admin-layout headerTitle="Edit Data Pengguna">

    <x-card title="Data Pengguna">
        <x-form action="{{ route('kelolaPengguna.update', $user) }}" method="PUT">
            <x-input name="nama" type="text" value="{{ $user->nama }}" />
            <x-input name="username" type="text" value="{{ $user->username }}" />
            <x-input name="password" type="text" />
            <x-select class="" name="roleId" label="Role">
                <option value="{{ $user->role_id}}">{{ $user->role->nama}}</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">
                    {{ $role->nama }}
                </option>
                @endforeach
            </x-select>
        </x-form>
    </x-card>

    </x-admin-layot>