<x-admin-layout headerTitle="Master Data Produk">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="col"></div>
        <div class="col d-flex">
            <div class="ml-auto">
                <x-split-button class="btn-primary" href="{{ route('produk.create') }}" label="Produk" />
                <div class="my-2"></div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                @include('produk.table')

            </div>
        </div>
    </div>

    @push('scripts')
        @include('pelanggan.script')
    @endpush

</x-admin-layout>
