<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleDetails', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sales_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->integer('cantidad')->default(1);
            $table->float('subtotal',8,2);
            $table->float('descuento',6,2)->nullable();
            $table->float('Total',9,2);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleDetails');
    }
}
