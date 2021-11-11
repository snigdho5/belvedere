<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    //
    protected $fillable = [
        'advertiser_id', 'company_name','company_logo','job_type',
        'location', 'category','job_description', 'deadline_date',
        'salary_offer', 'adv_email', 'adv_phone'
    ];
}
