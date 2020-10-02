<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_batas_akhir');
            $table->date('tanggal_pengembalian');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->tinyInteger('status_ontime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
