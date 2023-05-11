<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Overstocks;
class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'product_code',
        'unit_price',
        'quantity',
        'inventory_value'
    ];

   /* protected static function boot()
    {
        parent::boot();
        static::saved(function ($product) {
            if ($product->quantity > 30) {
                $excess = $product->quantity - 30;
                $overstock = new Overstocks ([
                    'name' => $product->name,
                    'quantity' => $excess,
                    'inventory_value' => $product->unit_price * $excess
                ]);
                $overstock->save();
                $product->quantity = 30;
                $product->save();
            }
        });

        static::updating(function ($product) {
            $originalQuantity = $product->getOriginal('quantity');
            $newQuantity = $product->quantity;

            if ($newQuantity < $originalQuantity) {
                $difference = $originalQuantity - $newQuantity;
                $product->quantity -= abs($difference);
            }

            $product->inventory_value = $product->unit_price * $product->quantity;
        });
    }*/
}

