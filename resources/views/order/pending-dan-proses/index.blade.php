<x-admin-layout headerTitle="Data Orderan Online">

    @push('stylesheet')
        <!-- Custom styles for this page -->
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <div class="text-dark">
        <p>Status Pending & Proses</p>
    </div>
    <x-card title="Data Orderan Online">
        <div class="table-responsive">
            <table id="updatedTable" class="table border table-striped text-dark">
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
                </tbody>
            </table>
        </div>
    </x-card>

<!-- MODALS -->
<x-modal id="ubahStatus" title="Ubah Status">
    <form id="ubahStatusForm" action="" method="POST">
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

    @push('scripts')
        @include('order.pending-dan-proses.script')
    @endpush

</x-admin-layout>

