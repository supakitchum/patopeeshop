<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['email', 'title', 'order_ref', 'detail', 'phone','status'];
    function order()
    {
        return $this->hasMany(order::class, 'order_ref', 'reference');
    }
}
