<!-- Modal lihat -->
<div class="modal fade" id="code-{{ $nomor }}" role="dialog" aria-labelledby="kode-qr" aria-hidden="true"
    tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kode QR Meja Nomor {{ $nomor }}</h5>
                <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9/' . $nomor) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                <button class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>
