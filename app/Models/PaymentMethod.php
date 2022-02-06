<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description'];
    public function transactions() {
        return $this->hasMany('App\Models\Transaction', 'payment_method_id', 'id');
    }
}
