<x-admin-layout headerTitle="Data Orderan Online">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="text-dark">
        <p>Status Dibatalkan</p>
    </div>
    <x-card title="Data Orderan Online">
        <div class="table-responsive">
            <table id="dataTable" class="table border table-striped text-dark">
                <thead>
                    <tr>
                        <th style="width:24.1719px">No.</th>
                        <th style="width:69px">No. Order</th>
                        <th style="width:150.5px">Nama</th>
                        <th style="width:78.4375px">Whatsapp</th>
                        <th style="text-align:center; width:171.688px">Orderan</th>
                        <th style="text-align:center; width:44.7188px">Status</th>
                        <th style="text-align:center; width:81.9062px">Status Dapur</th>
                        <th style="text-align:center; width:116.578px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border table-bordered">
                    @php
                        $counter = 1;
                    @endphp
                    @foreach($data as $item)
                    <tr class="mb-3">
                        <td>{{ $counter }}</td>
                        <td>{{$item->kode}}</td>
                        <td style="max-width: 100px;">
                            <div class="text-truncate">
                                {{$item->nama}}
                            </div>
                        </td>
                        <td>{{$item->no_hp}}</td>
                        <td class="text-center">
                            <p class="mb-1">Meja No. 14</p>
                            <p class="small mb-1">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</p>
                        </td>
                        <td class="text-center text-danger font-weight-bold">{{$item->nama_status}}</td>
                        <td class="text-center">-</td>
                        <td class="text-center d-flex justify-content-center border-bottom-0">
                            <button type="button" class="btn btn-warning mr-1" title="Edit Status" data-toggle="modal" data-target="#ubahStatus"><i class="fas fa-pencil-alt fa-xs"></i></button>
                            <a href="/order/dibatalkan/edit/{{$item->kode}}" class="btn btn-primary mr-1" title="Edit Data"><i class="fas fa-search"></i></a>
                        </td>
                    </tr>
                    @php
                        $counter++;
                    @endphp

                    <!-- MODALS -->
                    <x-modal id="ubahStatus" title="Ubah Status">
                        <form action="{{ route('order.pending-dan-proses.update-status', ['id' => $item->kode]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status_id">
                                    @foreach($status as $s)
                                    <option value="{{ $s->id }}">{{$s->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button> 
                            </div> 
                        </form>
                          
                    </x-modal>
                    <!-- END MODALS -->

                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>

    @push('scripts')
        @include('order.pending-dan-proses.script')
    @endpush

</x-admin-layout>

