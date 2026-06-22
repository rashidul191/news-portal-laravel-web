<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ([
        'postTitle',
        'postBody',
        'category',
        'featherPost',
        'treandingPost',
        'postImage',
        'views',
        'multycats',
        'auther',
        'tag',
        'description',
        'postTitle_eng',
        'auther_eng',
        'postBody_eng',
    ]);
}
