<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['name'];
}

function product()
{
    return $this->belongsToMany(Product::class, 'cid', 'id');
}