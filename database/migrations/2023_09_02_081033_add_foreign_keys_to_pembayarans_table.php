<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->foreign(['kategori_pembayaran_id'], 'fk_kategori_bayar')->references(['id'])->on('kategori_pembayarans');
            $table->foreign(['user_id'], 'fk_kasir_pembayaran')->references(['id'])->on('users');
            $table->foreign(['pesanan_id'], 'fk_bayar_pesanan')->references(['id'])->on('pesanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign('fk_kategori_bayar');
            $table->dropForeign('fk_kasir_pembayaran');
            $table->dropForeign('fk_bayar_pesanan');
        });
    }
};
