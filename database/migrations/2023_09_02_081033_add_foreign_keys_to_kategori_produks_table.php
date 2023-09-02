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
        Schema::table('kategori_produks', function (Blueprint $table) {
            $table->foreign(['dapur_id'], 'fk_kategori_dapur')->references(['id'])->on('kategori_dapurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_produks', function (Blueprint $table) {
            $table->dropForeign('fk_kategori_dapur');
        });
    }
};
