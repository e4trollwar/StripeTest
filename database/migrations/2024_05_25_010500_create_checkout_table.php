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
        Schema::create('checkout', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('qty')->nullable();
            $table->float('total', 11)->nullable();
            $table->string('modeOfPayment')->nullable();
            $table->string('customerAddress')->nullable();
            $table->string('customerNumber')->nullable();
            $table->timestamp('dateCheckout', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
