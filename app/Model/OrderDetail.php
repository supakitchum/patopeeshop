<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'color',
        'size',
        'product_name',
        'price',
        'amount',
        'image'
    ];
}
