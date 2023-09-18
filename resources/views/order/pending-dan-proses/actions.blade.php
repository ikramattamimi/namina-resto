<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-warning mr-1" title="Edit Status" data-toggle="modal" data-target="#ubahStatus{{ $item->kode }}">
        <i class="fas fa-pencil-alt fa-xs"></i>
    </button>
    <a href="/order/pendingDanProses/edit/{{ $item->kode }}" class="btn btn-primary mr-1" title="Edit Data">
        <i class="fas fa-edit fa-xs"></i>
    </a>
    <a href="#" class="btn btn-success mr-1" title="Cetak Nota Proses">
        <i class="fas fa-print fa-xs"></i>
    </a>
</div>

<!-- MODALS -->
<x-modal id="ubahStatus{{ $item->kode }}" title="Ubah Status">
    <form action="{{ route('order.pending-dan-proses.update-status', ['id' => $item->kode]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="exampleFormControlTextarea1">Status</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status_id">
           
        </select>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>  
    </form>
</x-modal>
<!-- END MODALS -->
