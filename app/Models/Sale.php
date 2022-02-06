<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id', 'user_id'
    ];
    public function client() {
        return $this->belongsTo('App\Models\Client');
    }
    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }
    public function products() {
        return $this->hasMany('App\Models\SoldProduct');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
