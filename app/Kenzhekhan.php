<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kenzhekhan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'product_category_id', 'country',
        'price', 'stock', 'stock_defective', 'image','availability',
        'weight','product_code','usage',
    ];

    public function category()
    {
        return $this->belongsTo('App\Kenzhekhan', 'product_category_id')->withTrashed();
    }
    public function solds()
    {
        return $this->hasMany('App\SoldProduct','kenzhekhan_id');
    }
    public function receiveds()
    {
        return $this->hasMany('App\ReceivedProduct','kenzhekhan_id');
    }
}
