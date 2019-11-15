<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name'];


    function product()
    {
        return $this->belongsToMany(Product::class, 'color', 'id');
    }
}