<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name'];
}
function product()
{
    return $this->belongTo(Size::class, 'size', 'id');
}