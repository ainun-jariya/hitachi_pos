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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id')->unsigned();
            $table->index('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->integer('product_variant_id')->unsigned();
            $table->index('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->double('qty');
            $table->double('price');
            $table->double('variant');
            $table->string('note');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
