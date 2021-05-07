<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('userId_FK');
            $table->date('pickUpDate');
            $table->time('pickUpTime');
            $table->string('description')->nullable();;
            $table->foreign('driverId_FK')->nullable();
            $table->foreign('cleanerId_FK')->nullable();

            $table->string('collected_status')->nullable();
            $table->string('cleaned_status')->nullable();
            $table->string('returned_status')->nullable();

            $table->foreign('returned_driver')->nullable();
            $table->string('paid')->nullable();
         

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
        Schema::dropIfExists('order');
    }
}
