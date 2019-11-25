<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount', 'slip', 'transfer_at', 'bank', 'order_ref', 'confirm'];
    protected $dates = ["transfer_at"];

    function order()
    {
        return $this->hasMany(order::class, 'order_id', 'id');
    }
}
