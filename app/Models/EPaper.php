<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPaper extends Model
{
    use HasFactory;
    protected $fillable = ([
        'image_name',
        'pageno',
    ]);
}
