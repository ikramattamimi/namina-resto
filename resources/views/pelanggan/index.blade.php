<x-admin-layout headerTitle="Master Data Pelanggan">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="col"></div>
        <div class="col d-flex">
            <div class="ml-auto">
                <x-split-button class="btn-primary" href="{{ route('pelanggan.create') }}" label="Pelanggan" />
                <div class="my-2"></div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $pelanggan->nama }}</td>
                                <td>{{ $pelanggan->no_hp }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-circle btn-primary btn-sm" id="detailPelanggan"
                                            name="detailPelanggan" href="#" role="button">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a class="btn btn-circle btn-warning btn-sm" id="editPelanggan"
                                            name="editPelanggan" href="#" role="button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-circle btn-danger btn-sm" id="hapusPelanggan"
                                            name="hapusPelanggan"
                                            href="{{ route('pelanggan.destroy', $pelanggan->id) }}" role="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('pelanggan.script')
    @endpush

</x-admin-layout>
