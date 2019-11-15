<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['order_id', 'tracking_number', 'amount', 'comment', 'uid', 'sender_id', 'sending', 'address', 'send_at', 'platform'];
    function order()
    {
        return $this->hasMany(order::class, 'order_id', 'id');
    }

    function user()
    {
        return $this->hasOne(User::class, 'uid', 'id');
    }

    function sender()
    {
        return $this->hasOne(Sender::class, 'sender_id', 'id');
    }
}