<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedProduct extends Model
{
    protected $fillable = [
        'receipt_id', 'product_id','kenzhekhan_id' ,'stock', 'stock_defective'
    ];

    public function receipt()
    {
        return $this->belongsTo('App\Receipt');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function kenzhekhan()
    {
        return $this->belongsTo('App\Kenzhekhan');
    }
}
