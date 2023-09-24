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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->double('total_price');
            $table->double('total_discounted');
            $table->string('payment_method');
            $table->string('status');
            $table->integer('outlet_id')->unsigned();
            $table->index('outlet_id');
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->nullableMorphs('transactable');
            $table->boolean('is_delivery')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
