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
        Schema::create('stock_cards', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('stockName');
            $table->string('supplierName')->nullable(); //
            $table->string('customerName')->nullable(); //
            $table->integer('stockQuantity')->nullable(); //
            $table->integer('stockQuantityReturn')->nullable(); //
            $table->integer('stockQuantityIssued')->nullable(); //
            $table->integer('stockBalance')->nullable();
            $table->string('comments')->nullable();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_cards');
    }
};
