<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'product_category_id', 'country',
        'price', 'stock', 'stock_defective', 'image','availability',
        'weight','product_code','usage',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id')->withTrashed();
    }

    public function solds()
    {
        return $this->hasMany('App\Models\SoldProduct');
    }

    public function receiveds()
    {
        return $this->hasMany('App\ReceivedProduct');
    }
}
