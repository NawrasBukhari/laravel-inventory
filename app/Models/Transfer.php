<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'title', 'sended_amount', 'received_amount', 'sender_method_id', 'receiver_method_id', 'reference'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function sender_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod', 'sender_method_id');
    }

    public function receiver_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod', 'receiver_method_id');
    }
}
