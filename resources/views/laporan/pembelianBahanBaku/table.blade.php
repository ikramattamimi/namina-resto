<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Nama Bahan Baku</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Nama Staff Gudang</th>
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
        </tr>
        @endforeach
    </tbody>
</table>