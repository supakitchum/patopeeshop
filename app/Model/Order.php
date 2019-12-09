<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'mid',
        'status',
        'tracking_number',
        'reference',
        'admin_id',
        'total',
        'sender_id',
        'platform',
        'fname',
        'lname',
        'email',
        'province',
        'district',
        'amphoe',
        'zip_code',
        'address',
        'phone'
    ];

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
}
