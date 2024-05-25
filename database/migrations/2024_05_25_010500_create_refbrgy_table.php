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
        Schema::create('refbrgy', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('brgyCode')->nullable();
            $table->text('brgyDesc')->nullable();
            $table->string('regCode')->nullable();
            $table->string('provCode')->nullable();
            $table->string('citymunCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refbrgy');
    }
};
