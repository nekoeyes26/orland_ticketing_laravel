<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creator', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_organizer');
            $table->string('alamat')->nullable();
            $table->string('nomor_ponsel')->nullable();
            $table->string('tentang')->nullable();
            $table->string('nomor_ktp')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('creator');
    }
}
