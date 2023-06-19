<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Supplier extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        //'suid',
        'email_address',
        'contact_number',
        'status',
        'address'
    ];

    //protected $primaryKey = 'suid';
    
    public function products(){
        return $this->hasMany(Product::class, 'supplier_id');
    }

}
