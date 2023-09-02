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
        Schema::create('pembelian_bahan_bakus', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('bahan_baku_id')->index('fk_penambahan_bahan_baku');
            $table->integer('jumlah')->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->string('nama_staff_gudang')->nullable();
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
        Schema::dropIfExists('pembelian_bahan_bakus');
    }
};
