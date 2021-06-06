<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
