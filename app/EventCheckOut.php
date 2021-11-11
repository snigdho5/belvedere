<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCheckOut extends Model
{
    protected $fillable = [
        'user_id','package', 'eventfee', 'payerID', 'orderID', 'name','year','address','phone_no','payment_json',
    ];
}
