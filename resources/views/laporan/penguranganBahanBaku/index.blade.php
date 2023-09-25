<?php

use App\Models\PenguranganBahanBaku;
?>

<x-admin-layout headerTitle="Laporan Data Pembelian Bahan Baku">

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
                            <label>Bahan Baku</label>
                            <select value="" name="bahan_baku" class="form-control">
                                <option value="semua">- Semua -</option>
                                @foreach($bahanBakus as $bahanBaku)
                                <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
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
            if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['bahan_baku'])) {
                $tgl_dari = $_GET['tanggal_dari'];
                $tgl_sampai = $_GET['tanggal_sampai'];
                $bahan_baku = $_GET['bahan_baku'];

                if ($bahan_baku == 'semua') {
                    $penguranganBahanBakus = PenguranganBahanBaku::where('tanggal', '>=', $tgl_dari)
                        ->where('tanggal', '<=', $tgl_sampai)
                        ->orderBy('tanggal', 'asc')
                        ->get();
                } else {
                    $penguranganBahanBakus = PenguranganBahanBaku::where('bahan_baku_id', $bahan_baku)
                        ->where('tanggal', '>=', $tgl_dari)
                        ->where('tanggal', '<=', $tgl_sampai)
                        ->orderBy('tanggal', 'asc')
                        ->get();
                }
            ?>

                <form action="{{ route('laporanPenguranganBahanBaku.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="tgl_dari" value="{{ $tgl_dari }}">
                    <input type="hidden" name="tgl_sampai" value="{{ $tgl_sampai }}">
                    <input type="hidden" name="bahan_baku" value="{{ $bahan_baku }}">
                    <button type="submit" class="btn btn-link" style="padding: 0;">
                        <i class="fas fa-file-upload">   Export Excel</i>
                    </button>
                </form>
                </br>

                <div class="table-responsive">
                    @include('laporan.penguranganBahanBaku.table')
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