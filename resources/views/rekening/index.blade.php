<x-admin-layout headerTitle="Master Data Rekening">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="col"></div>
        <div class="col d-flex">
            <div class="ml-auto">
                <x-split-button class="btn-primary" href="{{ route('rekening.create') }}" label="Rekening" />
                <div class="my-2"></div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Rekening</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('rekening.table')
            </div>
        </div>
    </div>

    @push('scripts')
        @include('rekening.script')
    @endpush

</x-admin-layout>
