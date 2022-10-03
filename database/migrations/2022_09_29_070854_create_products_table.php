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
            $table->string('name')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('image',255)->nullable();
            $table->string('thumbnail_img',255)->nullable();
            $table->string('feature_img',255)->nullable();
            $table->longText('description')->nullable();
            $table->double('price',10,2)->nullable();
            $table->double('tax',10,2)->nullable();
            $table->string('unit',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->string('published',191)->nullable()->default('1');
            $table->string('status',191)->nullable()->default('1');
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
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
