<x-admin-layout headerTitle="Master Data Pelanggan">

    <div class="row">
        <div class="col"></div>
        <div class="col d-flex">
            <div class="ml-auto">
                <x-split-button href="{{ route('pelanggan.create') }}" label="Pelanggan"
                    class="btn-primary" />
                <div class="my-2"></div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>