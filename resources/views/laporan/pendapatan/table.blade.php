<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:24.1719px">No.</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0
        @endphp
        @foreach ($pendapatans as $pendapatan)
        <tr>
            <td>1</td>
            <td>{{ $pendapatan->tanggal }}</td>
            <td>Rp {{ number_format($pendapatan->total_pendapatan) }}</td>
        </tr>
        @php
        $total += $pendapatan->total_pendapatan;
        @endphp
        @endforeach
        <tr>
            <td colspan="2" style="text-align: right">Total</td>
            <td>Rp {{ number_format($total) }}</td>
        </tr>
    </tbody>
</table>