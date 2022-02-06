<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
//    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = ['name', 'region'];
}
