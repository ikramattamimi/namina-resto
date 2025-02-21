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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->tinyInteger('status_pesanan_id')->index('fk_status_pesanan');
            $table->bigInteger('id_pelanggan')->index('fk_id_pelanggan');
            $table->string('kode')->nullable();
            $table->tinyInteger('no_meja')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
};