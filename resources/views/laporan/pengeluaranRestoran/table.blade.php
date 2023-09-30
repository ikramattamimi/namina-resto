<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Tanggal</th>
            <th>Nama Pengeluaran</th>
            <th>Jumlah</th>
            <th>Rekening</th>
            <th>Nama Admin</th>
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
            <td>{{ $pengeluaranRestoran->nama_admin}}</td>
        </tr>
        @endforeach
    </tbody>
</table>