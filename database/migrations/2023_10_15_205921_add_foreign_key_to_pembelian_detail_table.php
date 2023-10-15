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
        Schema::table('pembelian_detail', function (Blueprint $table) {
            $table->foreign(['bahan_baku_id'], 'fk_penambahan_bahan_baku')->references(['id'])->on('bahan_bakus');
            $table->foreign(['pembelian_id'], 'fk_pembelian_bahan_baku')->references(['id'])->on('pembelian_bahan_bakus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelian_detail', function (Blueprint $table) {
            $table->dropForeign('fk_penambahan_bahan_baku');
            $table->dropForeign('fk_pembelian_bahan_baku');
        });
    }
};
