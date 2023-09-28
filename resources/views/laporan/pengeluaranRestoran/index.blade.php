<?php

use App\Models\PengeluaranRestoran;
?>

<x-admin-layout headerTitle="Laporan Data Pengeluaran Restoran">

    @push('stylesheet')
    <!-- Custom styles for this page -->
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <form method="get" action="">
                <div class="row">
                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Mulai Tanggal</label>
                            <input autocomplete="off" type="date" value="<?php if (isset($_GET['tanggal_dari'])) {
                                                                                echo $_GET['tanggal_dari'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input autocomplete="off" type="date" value="<?php if (isset($_GET['tanggal_sampai'])) {
                                                                                echo $_GET['tanggal_sampai'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Rekening</label>
                            <select value="" name="rekening" class="form-control">
                                <option value="semua">- Semua -</option>
                                @foreach($rekenings as $rekening)
                                <option value="{{ $rekening->id }}">{{ $rekening->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        </br>
                        <div class="form-group">

                            <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <?php
            if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['rekening'])) {
                $tgl_dari = $_GET['tanggal_dari'];
                $tgl_sampai = $_GET['tanggal_sampai'];
                $rekening = $_GET['rekening'];

                if ($rekening == 'semua') {
                    $pengeluaranRestorans = PengeluaranRestoran::where('tanggal', '>=', $tgl_dari)
                        ->where('tanggal', '<=', $tgl_sampai)
                        ->orderBy('tanggal', 'asc')
                        ->get();
                } else {
                    $pengeluaranRestorans = PengeluaranRestoran::where('rekening_id', $rekening)
                        ->where('tanggal', '>=', $tgl_dari)
                        ->where('tanggal', '<=', $tgl_sampai)
                        ->orderBy('tanggal', 'asc')
                        ->get();
                }
            ?>

                <form action="{{ route('laporanPengeluaranRestoran.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tgl_dari" value="{{ $tgl_dari }}">
                    <input type="hidden" name="tgl_sampai" value="{{ $tgl_sampai }}">
                    <input type="hidden" name="rekening" value="{{ $rekening }}">
                    <button type="submit" class="btn btn-link" style="padding: 0;">
                        <i class="fas fa-file-upload">   Export Excel</i>
                    </button>
                </form>
                </br>

                <div class="table-responsive">
                    @include('laporan.pengeluaranRestoran.table')
                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-info text-center">
                    Silahkan Filter Laporan Terlebih Dulu.
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    @push('scripts')
    @include('laporan.script')
    @endpush

</x-admin-layout>