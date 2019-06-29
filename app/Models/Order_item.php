<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $fillable = ['order_id','product_id','qty','price'];

    public function Product()
    {
    	return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
