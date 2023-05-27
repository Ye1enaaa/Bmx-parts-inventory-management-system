<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'stockName',
        'supplierName',
        'stockQuantity',
        'stockBalance',
        'product_id'
    ];
}
