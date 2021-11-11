<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olddata extends Model
{
    protected $fillable = [
        'title', 'first_name','surname','year_left',
        'email', 'contact_no','postal_address_1','postal_address_2',
        'postal_address_3', 'city','occupation','gpdr',
        'deceased', 'events_history',
    ];
}
