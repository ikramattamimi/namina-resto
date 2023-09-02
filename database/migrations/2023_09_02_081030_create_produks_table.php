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
        Schema::create('produks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyInteger('kategori_produk_id')->nullable()->index('fk_kategori_produk');
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->integer('stok')->nullable();
            $table->decimal('harga_jual', 10, 0)->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
