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
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid')->nullable();
            $table->integer('productid')->nullable();
            $table->string('category')->nullable();
            $table->string('productName')->nullable();
            $table->string('image')->nullable();
            $table->float('price', 11)->nullable();
            $table->integer('count')->nullable()->default(0);
            $table->float('total', 11)->nullable();
            $table->string('status', 50)->nullable();
            $table->timestamp('created_at', 6)->nullable();
            $table->timestamp('updated_at', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
