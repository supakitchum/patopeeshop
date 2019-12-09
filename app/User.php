<?php

namespace App;

use App\Model\Order;
use App\Model\Receipt;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'fname','lname', 'email', 'password', 'province', 'district','amphoe', 'zip_code', 'address', 'phone', 'email_verified_at','provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function order()
    {
        return $this->belongsTo(Order::class, 'mid', 'id');
    }

    function receipt()
    {
        return $this->belongsTo(Receipt::class, 'uid', 'id');
    }
}
