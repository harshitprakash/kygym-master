<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->on('categories')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sub_cat_id');
            $table->foreign('sub_cat_id')->on('subcategories')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description');
            $table->decimal('price',10,2);
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
