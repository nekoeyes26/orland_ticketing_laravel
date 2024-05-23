<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('nama_event');
            $table->bigInteger('id_format_event')->unsigned()->index();
            $table->bigInteger('id_topik_event')->unsigned()->index();
            $table->bigInteger('id_kategori_event')->unsigned()->index();
            $table->dateTime('waktu_event');
            $table->string('lokasi_provinsi_event');
            $table->string('lokasi_kota_event');
            $table->string('lokasi_detail_event');
            $table->string('deskripsi_event');
            $table->string('banner_event')->nullable();
            $table->integer('status_event');
            $table->string('email')->index();
            $table->timestamps();

            $table->foreign('id_format_event')
            ->references('id_format_event')->on('format_event')
            ->onDelete('cascade');
            $table->foreign('id_topik_event')
            ->references('id_topik_event')->on('topik_event')
            ->onDelete('cascade');
            $table->foreign('id_kategori_event')
            ->references('id_kategori_event')->on('kategori_event')
            ->onDelete('cascade');
            $table->foreign('email')
            ->references('email')->on('creator')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
