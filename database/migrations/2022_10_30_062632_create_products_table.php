<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable(); 
            $table->unsignedBigInteger('sub_category_id')->nullable(); 
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->boolean('is_available')->default(false);
            $table->integer('is_sold')->default(false);
            $table->integer('is_approved')->default(false);
            $table->string('name');
            $table->bigInteger('cost');
            $table->bigInteger('price');
            $table->integer('quantity');
            $table->string('description');
            $table->string('images')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('sub_category_id')
            ->references('id')
            ->on('sub_categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
};
