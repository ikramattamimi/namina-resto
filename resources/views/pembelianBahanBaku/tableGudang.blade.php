<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Nama Bahan Baku</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Nama Staff Gudang</th>
            <th style="text-align:center; width:116.578px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelianGudang as $pembelianBahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $pembelianBahanBaku->bahan_baku->nama }}</td>
            <td>{{ $pembelianBahanBaku->jumlah }}</td>
            <td>{{ $pembelianBahanBaku->tanggal }}</td>
            <td>{{ $pembelianBahanBaku->nama_staff_gudang }}</td>
            <td style="text-align:center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pembelianBahanBaku.destroy', $pembelianBahanBaku->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-circle btn-warning btn-sm" id="editPembelianBahanBaku" name="editPembelianBahanBaku" href="{{ route('pembelianBahanBaku.edit', $pembelianBahanBaku->id) }}" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-danger btn-sm" id="hapusPembelianBahanBaku" name="hapusPembelianBahanBaku" href="{{ route('pembelianBahanBaku.destroy', $pembelianBahanBaku->id) }}" role="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>