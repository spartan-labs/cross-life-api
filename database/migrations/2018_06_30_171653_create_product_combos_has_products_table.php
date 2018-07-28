<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCombosHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_combos_has_products');
        Schema::create('product_combos_has_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned()->nullable();
            $table->foreign('products_id')
                ->references('id')->on('products');
            $table->integer('product_combos_id')->unsigned()->nullable();
            $table->foreign('product_combos_id')
                ->references('id')->on('product_combos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_combos_has_products');
    }
}
