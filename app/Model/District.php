<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'district',
        'amphoe',
        'province',
        'zipcode',
        'district_code',
        'amphoe_code',
        'province_code'
    ];
}
