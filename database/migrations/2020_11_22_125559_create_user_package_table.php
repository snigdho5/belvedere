<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpackages', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('useremail')->nullable();
           
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('month')->nullable();
            

 
            
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('package_id')->nullable();
            $table->bigInteger('status')->default(0);
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
        Schema::dropIfExists('userpackages');
    }
}
