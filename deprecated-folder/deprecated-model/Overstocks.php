<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overstocks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'inventory_value'
    ];
}
