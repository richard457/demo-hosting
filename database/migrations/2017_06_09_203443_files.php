<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration {


   public function up()
    {
         Schema::create('files', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->tinyInteger('group_id')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('folder_id');
            $table->string('dropbox_name');
            $table->float('file_size');
            $table->enum('file_privacy', ['Private', 'Public'])->default('Private');
            $table->string('mime');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['folder_id','group_id']);
         });
    }


    public function down()
    {
        Schema::drop('files');
    }

}
