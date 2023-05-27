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
            $table->string('name');
            $table->unsignedBigInteger('supplier_id');
            $table->string('description');
            $table->string('product_code');
            $table->float('unit_price');
            $table->integer('quantity');
            $table->float('inventory_value');
            $table->timestamps();

            //$table->dropForeign('products_supplier_id_foreign');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('supplies');
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
