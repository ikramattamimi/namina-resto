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
        @foreach ($penguranganBahanBakus as $penguranganBahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $penguranganBahanBaku->bahan_baku->nama }}</td>
            <td>{{ $penguranganBahanBaku->jumlah }}</td>
            <td>{{ $penguranganBahanBaku->tanggal }}</td>
            <td>{{ $penguranganBahanBaku->nama_staff_gudang }}</td>
        </tr>
        @endforeach
    </tbody>
</table>