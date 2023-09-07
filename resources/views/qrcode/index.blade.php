<x-admin-layout headerTitle="Buat Kode QR untuk Menu pada Meja">
    <div class="card">
        <div class="card-header">
            <h2>Simple QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Color QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->backgroundColor(255, 90, 0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
        </div>
    </div>
</x-admin-layout>
