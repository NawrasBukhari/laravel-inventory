<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    protected $fillable = [
        'sale_id', 'kenzhekhan_id', 'product_id', 'price', 'qty', 'total_amount',
    ];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function sale()
    {
        return $this->belongsTo('App\Models\Sale');
    }
    public function kenzhekhan()
    {
        return$this->belongsTo('App\Models\Kenzhekhan');
    }
}
