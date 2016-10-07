<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeminjamanRuangAlat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_ruang_alat', function (Blueprint $table) {
            $table->unsignedInteger('peminjaman_id');
            $table->unsignedInteger('ruang_id');
            $table->unsignedInteger('alat_id');

            $table->foreign('peminjaman_id')->references('peminjaman_id')->on('peminjaman')->onDelete('cascade');
            $table->foreign('ruang_id')->references('ruang_id')->on('ruang')->onDelete('cascade');
            $table->foreign('alat_id')->references('alat_id')->on('alat')->onDelete('cascade');

            $table->primary(['peminjaman_id', 'ruang_id', 'alat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
