<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $currentDateTime = now()->toDateTimeString();
        DB::table('suppliers')->insert([
            'name' => 'Test Supplier',
            'email_address' => 'testsupplier@example.ccn',
            'contact_number' => '09123334567',
            'address' => 'Test Address',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);
        \App\Models\Product::factory()->create([
             'name' => 'Test Product',
             'supplier_id' => '1',
             //'description' => 'ambot',
             'product_code' => '1234567892',
             'unit_price' => '2',
             'quantity' => '5',
             'inventory_value' => '10'
        ]);
    }
}
