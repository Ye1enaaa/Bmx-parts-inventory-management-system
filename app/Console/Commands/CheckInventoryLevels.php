<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Overstocks;
class CheckInventoryLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-inventory-levels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        /*$products = Product::all();

    foreach ($products as $product) {
        // Check if there is overstock for this product
        $overstock = Overstocks::where('name', $product->name)->first();

        if ($overstock && $overstock->quantity > 0) {
            // Add back the overstock to the product table
            $product->quantity += $overstock->quantity;
            $product->inventory_value += $overstock->inventory_value;
            $product->save();

            // Update the overstock table
            $overstock->quantity = 0;
            $overstock->inventory_value = 0;
            $overstock->save();
        } elseif ($product->quantity > 30) {
            // Move excess stock to the overstock table
            $quantity = $product->quantity - 30;
            $inventory_value = $quantity * $product->unit_price;

            $overstock = new Overstocks();
            $overstock->name = $product->name;
            $overstock->quantity = $quantity;
            $overstock->inventory_value = $inventory_value;
            $overstock->save();

            // Update the product table
            $product->quantity = 30;
            $product->inventory_value = $product->quantity * $product->unit_price;
            $product->save();
        }
    }
    }*/
    $products = Product::all();

    foreach ($products as $product) {
        // Check if there is overstock for this product
        $overstock = Overstocks::where('name', $product->name)->first();

        if ($overstock && $overstock->quantity > 0) {
            // Add back the overstock to the product table
            $remaining_quantity = 30 - $product->quantity;

            if ($remaining_quantity > $overstock->quantity) {
                $remaining_quantity = $overstock->quantity;
            }

            $product->quantity += $remaining_quantity;
            $product->inventory_value += $remaining_quantity * $product->unit_price;
            $product->save();

            // Update the overstock table
            $overstock->quantity -= $remaining_quantity;
            $overstock->inventory_value -= $remaining_quantity * $product->unit_price;

            if ($overstock->quantity < 0) {
                $overstock->quantity = 0;
            }

            if ($overstock->inventory_value < 0) {
                $overstock->inventory_value = 0;
            }

            $overstock->save();
        } elseif ($product->quantity > 30) {
            // Move excess stock to the overstock table
            $quantity = $product->quantity - 30;
            $inventory_value = $quantity * $product->unit_price;

            $overstock = new Overstocks();
            $overstock->name = $product->name;
            $overstock->quantity = $quantity;
            $overstock->inventory_value = $inventory_value;
            $overstock->save();

            // Update the product table
            $product->quantity = 30;
            $product->inventory_value = $product->quantity * $product->unit_price;
            $product->save();
        }
    }
    }
}
