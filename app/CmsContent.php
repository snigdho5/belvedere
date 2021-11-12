<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsContent extends Model
{
    protected $fillable = [
        'description', 'title','page_type','video_link','about_image'
    ];
}
