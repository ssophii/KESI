<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userRole extends Model
{
    protected $fillable = [
        'title',
        'link',
        'icon',
        'role',
    ];
}
