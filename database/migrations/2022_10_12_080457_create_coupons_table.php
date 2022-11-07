<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code',255)->unique();
            $table->boolean('type')->nullable();
            $table->double('price',10,2)->nullable();
            $table->string('times')->nullable();
            $table->string('percent',255)->nullable();
            $table->string('value',255)->nullable();
            $table->string('quantity',255)->nullable();
            $table->string('start_date',255)->nullable();
            $table->string('end_date',255)->nullable();
            $table->string('used',255)->nullable();
            $table->boolean('status')->nullable()->default('0');
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
        Schema::dropIfExists('coupons');
    }
}
