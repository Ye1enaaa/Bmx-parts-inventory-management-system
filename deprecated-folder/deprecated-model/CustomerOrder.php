<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'name',
        'user_name',
        'quantity',
        'total_value'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $appends = ['user_name'];

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
