<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shared extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shared_from_id')->unsigned()->index();
            $table->foreign('shared_from_id')->references('id')->on('users');
            $table->string('shared_to_email');
            $table->string('shared_docs_id');
            $table->string('shared_link');
            // $table->integer('folder_id')->unsigned()->index();
            // $table->foreign('folder_id')->references('id')->on('folders');
            $table->enum('accessLink_status',['none','password']);
            $table->string('accessLink_pswd');
            $table->string('accessLink_limitTime');
            $table->enum('checking_status',['0','1'])->default('0');
            $table->enum('docs_type',['file','folder']);
          
            $table->enum('shared_manager',['fulloption','can_edit','can_display'])->default('fulloption');
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
        Schema::dropIfExists('shared');
    }
}
