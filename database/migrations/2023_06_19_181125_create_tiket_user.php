<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_user', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->bigInteger('id_tiket')->unsigned()->index();
            $table->integer('kuantitas');
            $table->string('status');
            $table->timestamps();

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
        Schema::dropIfExists('tiket_user');
    }
}
