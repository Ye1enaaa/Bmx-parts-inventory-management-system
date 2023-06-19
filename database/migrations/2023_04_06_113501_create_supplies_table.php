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
        //Schema::rename('supplies', 'suppliers');
        Schema::create('supplies', function (Blueprint $table) {
            //$table->unsignedBigInteger('id')->primary();
            $table->id();
            //$table->unsignedBigInteger('suid')->primary();
            $table->string('name');
            $table->string('email_address');
            $table->string('contact_number');
            //$table->boolean('status')->default(true);
            $table->string('address');
            $table->timestamps();

            //$table->primary('suid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*Schema::table('supplies', function (Blueprint $table) {
            $table->increments('id')->change();
        });*/
        Schema::dropIfExists('supplies');
        //Schema::rename('supplies', 'suppliers');
    }
};
