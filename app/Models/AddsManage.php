<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddsManage extends Model
{
    use HasFactory;
    protected $fillable = ([
        'addsImg',
        'adds_link',
    ]);
}
