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
                    <img class="img-fluid" src="{{ asset('/storage/img/qr/meja_' . $nomor . '.png') }}"
                        alt="Kode QR Meja {{ $nomor }}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                <a class="btn btn-primary" href="{{ asset('/storage/img/qr/meja_' . $nomor . '.png') }}"
                    download>Unduh</a>
            </div>
        </div>
    </div>
</div>
