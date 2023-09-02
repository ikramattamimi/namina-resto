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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('pesanan_id')->index('fk_bayar_pesanan');
            $table->tinyInteger('kategori_pembayaran_id')->index('fk_kategori_bayar');
            $table->bigInteger('user_id')->index('fk_kasir_pembayaran');
            $table->dateTime('tanggal')->nullable();
            $table->decimal('jumlah', 10, 0)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
};
