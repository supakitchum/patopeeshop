<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'cid', 'color', 'size', 'quality'];


    function catalog()
    {
        return $this->belongsToMany(Catalog::class, 'cid', 'id');
    }

    function colors()
    {
        return $this->hasMany(Color::class, 'id','color');
    }
    function sizes()
    {
        return $this->hasMany(Size::class, 'id', 'size');
    }

    function order()
    {
        return $this->belongsToMany(Order::class, 'pid', 'id');
    }
}
