<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Dapur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
            <tr>
                <td class="col-1">
                    <img class="img-fluid rounded mb-3"
                        src="{{ asset('storage/gambar-kategori/' . $kategori->gambar) }}" />
                </td>
                <td class="col-7">{{ $kategori->nama }}</td>
                <td class="col-2">{{ $kategori->kategori_dapur->nama }}</td>
                <td class="col-2">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-circle btn-warning btn-sm" id="editProduk" name="editProduk"
                            href="{{ route('kategori.edit', $kategori->id) }}" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-circle btn-danger btn-sm" id="hapusProduk" name="hapusProduk"
                            href="{{ route('kategori.destroy', $kategori->id) }}" role="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
