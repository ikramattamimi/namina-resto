<x-admin-layout headerTitle="Data Orderan Online">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="text-dark">
        <p>Status Dibayar</p>
    </div>
    <x-card title="Data Orderan Online">
    <div class="table-responsive">
    <table id="dataTable" class="table table-responsive table-striped text-dark">
                    <thead>
                        <tr class="text-center border">
                            <th>No.</th>
                            <th>No. Order</th>
                            <th class="col-sm-3">Nama</th>
                            <th class="col-sm-3">Tanggal</th>
                            <th>Orderan</th>
                            <th>Status</th>
                            <th class="col-sm-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border table-bordered">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($data as $item)
                        <tr class="mb-3">
                            <td>{{$counter}}</td>
                            <td>{{$item->kode}}</td>
                            <td class="w-15" style="max-width: 100px;">
                                <div class="text-truncate">
                                    {{$item->nama}}
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</td>
                            <td>Meja No. 18</td>
                            <td>{{$item->nama_status}}</td>
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                <a href="/order/dibayar/edit/{{$item->kode}}" class="btn btn-primary mr-1" title="Detail"><i class="fas fa-edit fa-xs"></i></a>
                                <a href="#" class="btn btn-success mr-1" title="Cetak Nota Dapur"><i class="fas fa-print fa-xs"></i></a>
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
    </div>
    
    </x-card>

    @push('scripts')
        @include('order.pending-dan-proses.script')
    @endpush

</x-admin-layout>