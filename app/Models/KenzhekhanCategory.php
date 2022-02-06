<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KenzhekhanCategory extends Model
{
    use SoftDeletes;
    protected $table = 'product_categories';
    protected $fillable = ['name'];
    public function kenzhekhan()
    {
        return $this->hasMany('App\Models\Kenzhekhan');
    }
}
