<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateCheckOut extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'payerID', 'orderID', 'firstName', 'lastName','email','phone','payment_json',
    ];
}
