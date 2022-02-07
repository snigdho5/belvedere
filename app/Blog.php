<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'description', 'title', 'image'
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset("uploads/image/" . $value) : "";
    }
}
