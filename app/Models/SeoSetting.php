<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'route_name',
        'title_en',
        'title_fa',
        'description_en',
        'description_fa',
        'keywords_en',
        'keywords_fa',
        'og_image',
    ];
}
