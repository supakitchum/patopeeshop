<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['email', 'name', 'order_id', 'detail', 'phone'];
}
function order()
{
    return $this->hasMany(order::class, 'order_id', 'id');
}