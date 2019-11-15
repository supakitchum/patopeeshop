<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    protected $fillable = ['name', 'link'];
}

function sender()
{
    return $this->belongsTo(Receipt::class, 'sender_id', 'id');
}