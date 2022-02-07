<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'fromdate', 'todate', 'time','cost','image','desc','phone_no','email','address','address','map',
    ];
}
