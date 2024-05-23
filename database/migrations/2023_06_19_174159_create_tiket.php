<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id('id_tiket');
            $table->bigInteger('id_event')->unsigned()->index();
            $table->string('nama_tiket');
            $table->string('deskripsi_tiket');
            $table->double('harga_tiket');
            $table->integer('stock_tiket');
            $table->dateTime('batas_waktu');
            $table->integer('status_tiket');
            $table->timestamps();

            $table->foreign('id_event')
            ->references('id_event')->on('event')
            ->onDelete('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
}
