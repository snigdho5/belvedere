<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->string('mail');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('footer_desc1',1000);
            $table->string('phone_no');
            $table->string('location',2000);
            
            $table->string('footer_desc2',500);
            $table->string('footer_desc3',500);


            $table->string('become_member_desc',500);


            $table->string('twit_link',1000);
            $table->string('fb_link',1000);
            $table->string('google_link',1000);
            $table->string('linkedin_link',1000);
            $table->string('youtube_link',1000);


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
        Schema::dropIfExists('layouts');
    }
}
