<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['mid', 'pid'];
}

function user()
{
    return $this->hasOne(User::class, 'mid', 'id');
}

function product()
{
    return $this->belongsToMany(Product::class, 'pid', 'id');
}

function payment()
{
    return $this->belongsTo(Payment::class, 'order_id', 'id');
}

function receipt()
{
    return $this->belongsTo(Receipt::class, 'order_id', 'id');
}
function report()
{
    return $this->belongsTo(Report::class, 'order_id', 'id');
}