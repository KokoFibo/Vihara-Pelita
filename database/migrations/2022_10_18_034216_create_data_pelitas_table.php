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
        Schema::create('data_pelitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabang_id');

            $table->string('nama');
            $table->string('mandarin')->nullable();
            $table->string('jenis_kelamin');
            $table->integer('umur');
            $table->string('alamat');
            $table->string('kota');
            $table->string('telp')->nullable();;
            $table->string('hp')->nullable();;
            $table->string('email')->nullable();;
            $table->date('tgl_mohonTao');
            $table->string('keterangan')->nullable();;
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
        Schema::dropIfExists('data_pelitas');
    }
};
