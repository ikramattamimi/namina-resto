<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->no_hp }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- <a class="btn btn-circle btn-primary btn-sm" id="detailPelanggan"
                            name="detailPelanggan" href="#" role="button">
                            <i class="fas fa-info-circle"></i>
                        </a> --}}
                        <a class="btn btn-circle btn-warning btn-sm" id="editPelanggan" name="editPelanggan"
                            href="{{ route('pelanggan.edit', $pelanggan->id) }}" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-circle btn-danger btn-sm" id="hapusPelanggan" name="hapusPelanggan"
                            href="{{ route('pelanggan.destroy', $pelanggan->id) }}" role="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
