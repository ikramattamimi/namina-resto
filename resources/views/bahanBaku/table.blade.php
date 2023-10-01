<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Minimal Stok</th>
            <th>Satuan</th>
            <th style="text-align:center; width:116.578px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bahanBakus as $bahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $bahanBaku->nama }}</td>
            <td>{{ $bahanBaku->deskripsi }}</td>
            <td>{{ $bahanBaku->harga_beli }}</td>
            <td>{{ $bahanBaku->stok }}</td>
            <td>{{ $bahanBaku->minimal_stok }}</td>
            <td>{{ $bahanBaku->satuan }}</td>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bahanBaku.destroy', $bahanBaku->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-circle btn-warning btn-sm" id="editBahanBaku" name="editBahanBaku" href="{{ route('bahanBaku.edit', $bahanBaku->id) }}" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-danger btn-sm" id="hapusBahanBaku" name="hapusBahanBaku" href="{{ route('bahanBaku.destroy', $bahanBaku->id) }}" role="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>