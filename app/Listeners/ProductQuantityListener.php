<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Overstocks;
use App\Models\Product;
class ProductQuantityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }

    /*public function saving(Product $product)
    {
        $quantity = $product->quantity;
        $inventoryValue = $product->inventory_value;

        if ($quantity > 30) {
            $excessQuantity = $quantity - 30;
            $excessInventoryValue = $excessQuantity * $product->unit_price;

            $overstock = new Overstocks([
                'name' => $product->name,
                'quantity' => $excessQuantity,
                'inventory_value' => $excessInventoryValue,
            ]);

            $overstock->save();

            $product->quantity -= $excessQuantity;
            $product->inventory_value -= $excessInventoryValue;
        } elseif ($quantity < 30) {
            $missingQuantity = 30 - $quantity;
            $missingInventoryValue = $missingQuantity * $product->unit_price;

            $overstock = Overstocks::where('name', $product->name)->orderBy('created_at', 'desc')->first();

            if ($overstock) {
                $overstockQuantity = $overstock->quantity;
                $overstockInventoryValue = $overstock->inventory_value;

                if ($missingQuantity <= $overstockQuantity) {
                    $overstock->quantity -= $missingQuantity;
                    $overstock->inventory_value -= $missingInventoryValue;
                    $overstock->save();

                    $product->quantity += $missingQuantity;
                    $product->inventory_value += $missingInventoryValue;
                } else {
                    $product->quantity += $overstockQuantity;
                    $product->inventory_value += $overstockInventoryValue;

                    $overstock->delete();

                    $this->saving($product);
                }
            }
        }
    }*/
}
