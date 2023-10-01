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
        @foreach ($penguranganBahanBakus as $penguranganBahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $penguranganBahanBaku->bahan_baku->nama }}</td>
            <td>{{ $penguranganBahanBaku->jumlah }}</td>
            <td>{{ $penguranganBahanBaku->tanggal }}</td>
            <td>{{ $penguranganBahanBaku->nama_staff_gudang }}</td>
            <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penguranganBahanBaku.destroy', $penguranganBahanBaku->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-circle btn-warning btn-sm" id="editPenguranganBahanBaku" name="editPenguranganBahanBaku" href="{{ route('penguranganBahanBaku.edit', $penguranganBahanBaku->id) }}" role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-circle btn-danger btn-sm" id="hapusPenguranganBahanBaku" name="hapusPenguranganBahanBaku" href="{{ route('penguranganBahanBaku.destroy', $penguranganBahanBaku->id) }}" role="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>