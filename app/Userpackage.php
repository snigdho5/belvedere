<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userpackage extends Model
{
    protected $table = 'userpackages';
    protected $fillable = [
        'user_id','username','useremail','type','price','month','year_left',
        'start_date','end_date','package_id','status'
    ];

    public function packages()
    {
        return $this->belongsTo('App\Package','package_id');
    }
}
