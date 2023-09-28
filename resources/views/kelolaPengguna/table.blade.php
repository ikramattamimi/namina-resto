<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Nama</th>
            <th>Role</th>
            <th style="text-align:center; width:116.578px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>1</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->role->nama }}</td>
           <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kelolaPengguna.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-circle btn-warning btn-sm" id="editUser" name="editUser" href="{{ route('kelolaPengguna.edit', $user->id) }}" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-danger btn-sm" id="hapusUser" name="hapusUser" href="{{ route('kelolaPengguna.destroy', $user->id) }}" role="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>