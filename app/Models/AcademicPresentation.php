<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPresentation extends Model
{
    protected $fillable = [
        'route',
        'title_en',
        'title_fa',
        'markdown_content_en',
        'markdown_content_fa',
        'html_content_en',
        'html_content_fa',
    ];
}
