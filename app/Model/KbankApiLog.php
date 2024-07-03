<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KbankApiLog extends Model
{
    protected $fillable = [
        'transactionId',
        'channelCode',
        'billerType',
        'tranAmount',
        'reference1',
        'reference2',
        'status'
    ];
}
