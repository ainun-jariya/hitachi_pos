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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id')->unsigned();
            $table->index('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->integer('product_variant_id')->unsigned();
            $table->index('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->double('qty');
            $table->double('price');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
    }
};
