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
        Schema::create('myprofiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('jk')->nullable();
            $table->date('tanggal')->nullable();
            $table->double('nohp')->nullable();
            $table->string('kota')->nullable();
            $table->string('alamat')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('twitter')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('myprofiles');
    }
};
