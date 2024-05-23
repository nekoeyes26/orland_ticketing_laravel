<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_event')->unsigned()->index();
            $table->bigInteger('id_tiket')->unsigned()->index();
            $table->string('email');
            $table->timestamps();

            $table->foreign('id_event')
            ->references('id_event')->on('event')
            ->onDelete('cascade');

            $table->foreign('id_tiket')
            ->references('id_tiket')->on('tiket')
            ->onDelete('cascade');

            $table->foreign('email')
            ->references('email')->on('users')
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
        Schema::dropIfExists('pembelian');
    }
}
