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
        'customerName',
        'stockQuantity',
        'stockQuantityIssued',
        'stockBalance',
        'product_id'
    ];
}
