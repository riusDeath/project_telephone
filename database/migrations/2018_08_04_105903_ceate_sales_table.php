<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('sales', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('iamge');
            $table->int('sale');
            $table->tinyInteger('status')->default(1);
            $table->timestamp('date_create');
            $table->timestamp('date_end');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        })
        
    }
}
