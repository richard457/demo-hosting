<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shared_hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server_ip');
            $table->string('username');
            $table->integer('folder_id')->unsigned()->index();
            $table->foreign('folder_id')->references('id')->on('folders');

            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')->references('id')->on('files');


            $table->string('password');
            $table->integer('max_host')->default(5);
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
        Schema::dropIfExists('shared_hosts');
    }
}
