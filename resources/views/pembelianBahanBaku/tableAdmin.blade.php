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
        @foreach ($pembelianAdmin as $pembelianBahanBaku)
        <tr>
            <td>1</td>
            <td>{{ $pembelianBahanBaku->bahan_baku->nama }}</td>
            <td>{{ $pembelianBahanBaku->jumlah }}</td>
            <td>{{ $pembelianBahanBaku->tanggal }}</td>
            <td>{{ $pembelianBahanBaku->nama_staff_gudang }}</td>
            <td style="text-align:center">
                <form action="{{ route('pembelianBahanBaku.update', $pembelianBahanBaku->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="bahanBakuId" value="{{ $pembelianBahanBaku->bahan_baku->nama }}" />
                    <input type="hidden" name="jumlah" value="{{ $pembelianBahanBaku->jumlah }}" />
                    <input type="hidden" name="tanggal" value="{{ $pembelianBahanBaku->tanggal }}" />
                    <input type="hidden" name="status" value="setuju" />
                    <button type="submit" class="btn btn-link" style="padding: 0;">
                        <i class="fas fa-check"></i>
                    </button>
                </form>

                <form action="{{ route('pembelianBahanBaku.update', $pembelianBahanBaku->id) }}" method="POST" style="display: inline-block; margin-left: 10px;" >
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="bahanBakuId" value="{{ $pembelianBahanBaku->bahan_baku->nama }}" />
                    <input type="hidden" name="jumlah" value="{{ $pembelianBahanBaku->jumlah }}" />
                    <input type="hidden" name="tanggal" value="{{ $pembelianBahanBaku->tanggal }}" />
                    <input type="hidden" name="status" value="tolak" />
                    <button type="submit" class="btn btn-link" style="padding: 0;">
                        <i class="fas fa-times" style="color: red;"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>