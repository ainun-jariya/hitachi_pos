<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->index('category_id');
            $table->index('merchant_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('merchant_id')->references('id')->on('merchants'); //even the merchant deleted, the active product not magically gone from warehouse
            $table->string('name');
            $table->text('detail');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
