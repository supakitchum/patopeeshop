<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'cid', 'color', 'size', 'quality'];
}


function catalog()
{
    return $this->belongsToMany(Catalog::class, 'cid', 'id');
}

function color()
{
    return $this->belongsToMany(Color::class, 'color', 'id');
}
function size()
{
    return $this->hasMany(Size::class, 'size', 'id');
}