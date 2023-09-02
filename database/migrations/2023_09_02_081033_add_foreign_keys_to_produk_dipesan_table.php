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
        Schema::table('produk_dipesan', function (Blueprint $table) {
            $table->foreign(['produk_id'], 'fk_produk_dipesan2')->references(['id'])->on('produks');
            $table->foreign(['pesanan_id'], 'fk_produk_dipesan')->references(['id'])->on('pesanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk_dipesan', function (Blueprint $table) {
            $table->dropForeign('fk_produk_dipesan2');
            $table->dropForeign('fk_produk_dipesan');
        });
    }
};
