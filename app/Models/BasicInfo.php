<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    use HasFactory;
    protected $fillable = ([
        'name',
        'email',
        'phone_no',
        'logo',
        'fav_icon',
        'fb_link',
        'whatsapp',
        'instraLink',
        'youTubeLink',
        'google',
        'address',
        'twitter',
        'chiefAdviser',
        'editor',
        'adviserEditor',
        'copyright',
        'footerLogo',
    ]);
}
