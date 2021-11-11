<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_check_outs', function (Blueprint $table) {
            $table->id();
            $table->string('payerID')->nullable();
            $table->string('orderID')->nullable();
            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
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
        Schema::dropIfExists('event_check_outs');
    }
}
