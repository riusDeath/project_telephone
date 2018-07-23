<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->integer('total');
            $table->float('price');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('adress');
            $table->integer('phone');
            $table->tinyInteger('status')->default(0);
            $table->integer('pay_id')->unsigned()->nullable();;
            $table->foreign('pay_id')->references('id')->on('pays');
            $table->integer('ship_id')->unsigned()->nullable();;
            $table->foreign('ship_id')->references('id')->on('ships');
             $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
