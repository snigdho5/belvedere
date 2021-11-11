<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class career extends Model
{
    protected $fillable = [
        'email','title', 'date', 'location','category'  ,'image','desc','status',
    ];
}
