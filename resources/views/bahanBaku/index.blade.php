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
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Minimal Stok</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Minimal Stok</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($bahanBakus as $bahanBaku)
                            <tr>
                                <td>{{ $bahanBaku->nama }}</td>
                                <td>{{ $bahanBaku->deskripsi }}</td>
                                <td>{{ $bahanBaku->harga_beli }}</td>
                                <td>{{ $bahanBaku->stok }}</td>
                                <td>{{ $bahanBaku->minimal_stok }}</td>
                                <td>{{ $bahanBaku->satuan }}</td>
                                <td>{{ $bahanBaku->satuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>