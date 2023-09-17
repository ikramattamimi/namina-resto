<x-admin-layout headerTitle="Buat Kode QR untuk Menu pada Meja">
    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="row">
        <div class="col-lg-4 col-md-12">

            <x-card title="Jumlah Meja">
                <x-form action="{{ route('meja.update', $meja) }}" method="PUT">
                    <x-input name="jumlah" type="number" value="{{ $meja->jumlah }}" />
                </x-form>
            </x-card>

        </div>

        <div class="col-lg-8 col-md-12">
            <x-card title="Data Meja">
                <x-slot name="button">
                    <a class="btn btn-primary" href="{{ asset('/storage/img/qr/All.zip') }}" download>
                        Unduh semua kode QR
                    </a>
                </x-slot>

                <div class="table-responsive">
                    @include('meja.table')
                </div>
            </x-card>
        </div>
    </div>

    @push('scripts')
        @include('pelanggan.script')
    @endpush
</x-admin-layout>
