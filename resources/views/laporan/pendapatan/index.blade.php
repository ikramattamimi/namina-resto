<?php

use App\Models\PembelianBahanBaku;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

?>

<x-admin-layout headerTitle="Laporan Data Pendapatan">

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
            if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
                $tgl_dari = $_GET['tanggal_dari'];
                $tgl_sampai = $_GET['tanggal_sampai'];

                $pendapatans = DB::table('pesanans')
                    ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_bayar) as total_pendapatan'))
                    ->where('created_at', '>=', $tgl_dari)
                    ->where('created_at', '<=', $tgl_sampai)
                    ->whereNotIn('status_pesanan_id', [1, 4])
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->orderBy('tanggal')
                    ->get();
            ?>

                <form action="{{ route('laporanPendapatan.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tgl_dari" value="{{ $tgl_dari }}">
                    <input type="hidden" name="tgl_sampai" value="{{ $tgl_sampai }}">
                    <button type="submit" class="btn btn-link" style="padding: 0;">
                        <i class="fas fa-file-upload"> Export Excel</i>
                    </button>
                </form>
                </br>

                <div class="table-responsive">
                    @include('laporan.pendapatan.table')
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