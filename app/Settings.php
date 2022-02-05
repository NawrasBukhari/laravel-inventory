<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'theme',
    ];

    public const ROLES = [
        'white'     => 1,
        'dark'    => 2
    ];
}
