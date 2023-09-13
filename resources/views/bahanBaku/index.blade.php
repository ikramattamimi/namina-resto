<x-admin-layout headerTitle="Master Data Bahan Baku">

    <div class="row">
        <div class="col"></div>
        <div class="col d-flex">
            <div class="ml-auto">
                <x-split-button href="{{ route('pelanggan.create') }}" label="Bahan Baku" class="btn-primary" />
                <div class="my-2"></div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Bahan Baku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <tfoot>
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
                    </tfoot>
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
            </div>
        </div>
    </div>

</x-admin-layout>