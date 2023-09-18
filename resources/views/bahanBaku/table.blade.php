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
                            <td><button type="button" class="btn btn-warning mr-1" title="Edit Status" data-toggle="modal" data-target="#ubahStatus"><i class="fas fa-pencil-alt fa-xs"></i></button>
                                <a href="/order/pendingDanProses/edit" class="btn btn-primary mr-1" title="Edit Data"><i class="fas fa-edit fa-xs"></i></a>
                                <a href="#" class="btn btn-success mr-1" title="Cetak Nota Proses"><i class="fas fa-print fa-xs"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>