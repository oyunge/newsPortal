<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
        'site_name',
        'twitter',
        'youtube',
        'facebook',
        'instagram',
        'site_logo',
        'linkedin',
        'site_desc',
        'about'
    ];
}
