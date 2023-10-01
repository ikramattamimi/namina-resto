<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Tanggal</th>
            <th>Nama Pengeluaran</th>
            <th>Jumlah</th>
            <th>Rekening</th>
            <th>Nama Admin</th>
            <th style="text-align:center; width:116.578px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluaranRestorans as $pengeluaranRestoran)
        <tr>
            <td>1</td>
            <td>{{ $pengeluaranRestoran->tanggal }}</td>
            <td>{{ $pengeluaranRestoran->nama }}</td>
            <td>{{ $pengeluaranRestoran->jumlah }}</td>
            <td>{{ $pengeluaranRestoran->rekening->nama }}</td>
            <td>{{ $pengeluaranRestoran->nama_admin }}</td>
            <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengeluaranRestoran.destroy', $pengeluaranRestoran->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-circle btn-warning btn-sm" id="editPengeluaranRestoran" name="editPengeluaranRestoran" href="{{ route('pengeluaranRestoran.edit', $pengeluaranRestoran->id) }}" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-danger btn-sm" id="hapusPengeluaranRestoran" name="hapusPengeluaranRestoran" href="{{ route('pengeluaranRestoran.destroy', $pengeluaranRestoran->id) }}" role="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>