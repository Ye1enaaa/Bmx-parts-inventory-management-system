<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Supplie extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        //'suid',
        'contact_number',
        'status',
        'desc'
    ];

    //protected $primaryKey = 'suid';
    
    public function products(){
        return $this->hasMany(Product::class, 'supplier_id');
    }

}
