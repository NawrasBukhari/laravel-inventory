<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTableMigration extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('product_code')->default('0');
            $table->string('usage')->nullable();
            $table->boolean('availability')->default('0');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedDecimal('price', 10, 1);
            $table->unsignedinteger('stock')->default(0);
            $table->unsignedDecimal('weight')->default(0);
            $table->unsignedinteger('stock_defective')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
