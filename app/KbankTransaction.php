<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KbankTransaction extends Model
{
    protected $fillable = [
        "txn_id",
        "amount",
        "partner_id",
        "response",
        "status",
        "callback_data"
    ];

    protected $casts = [
        "response" => "array",
        "callback_data" => "array"
    ];
}
