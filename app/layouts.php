<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class layouts extends Model
{
    protected $fillable = [
        'mail', 'header_logo', 'footer_logo', 'footer_desc1', 'phone_no', 'location', 'footer_desc2', 'footer_desc3', 'become_member_desc', 'twit_link', 'fb_link', 'google_link', 'linkedin_link', 'youtube_link',
    ];
    public function getFooterLogoAttribute($value)
    {
        return $value ? asset("uploads/image/" . $value) : "";
    }
    public function getHeaderLogoAttribute($value)
    {
        return $value ? asset("uploads/image/" . $value) : "";
    }
}
