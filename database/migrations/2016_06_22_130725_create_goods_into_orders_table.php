<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsIntoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_into_orders', function (Blueprint $table) {
            $table->increments('idgoodsintoorder');
            $table->integer('idgood');
            $table->integer('idorder');
            $table->integer('countgood');
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
        Schema::drop('goods_into_orders');
    }
}
