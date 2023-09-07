<x-admin-layout headerTitle="Profil">

    <div class="row">
        <div class="col-xl-4 col-md-12">
            <x-card title="Foto Profil">
                <div class="text-center img-container">
                    <img class="rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}" alt="Foto Profil"
                        width="160px">
                </div>
            </x-card>
        </div>
        <div class="col-xl-8 col-md-12">
            <x-card title="Detail Akun">
                <x-form action="{{ route('profil.update', $user->id) }}" method="PUT" buttonText="Simpan">
                    <x-input name="nama" value="{{ $user->nama }}" label="Nama" />
                    <x-input name="username" value="{{ $user->username }}" label="Username" />
                    <x-input name="role" value="{{ $user->role->nama }}" label="Role" disabled />
                </x-form>
            </x-card>
        </div>
    </div>

</x-admin-layout>
