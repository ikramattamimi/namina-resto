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
        @foreach ($pembelianBahanBakus as $pembelianBahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $pembelianBahanBaku->bahan_baku->nama }}</td>
            <td>{{ $pembelianBahanBaku->jumlah }}</td>
            <td>{{ $pembelianBahanBaku->tanggal }}</td>
            <td>{{ $pembelianBahanBaku->nama_staff_gudang }}</td>
            <td><button type="button" class="btn btn-warning mr-1" title="Edit Status" data-toggle="modal" data-target="#ubahStatus"><i class="fas fa-pencil-alt fa-xs"></i></button>
                <a href="/order/pendingDanProses/edit" class="btn btn-primary mr-1" title="Edit Data"><i class="fas fa-edit fa-xs"></i></a>
                <a href="#" class="btn btn-success mr-1" title="Cetak Nota Proses"><i class="fas fa-print fa-xs"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>