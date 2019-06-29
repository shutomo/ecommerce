<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductReviews extends Model
{
    //
    protected $table = 'product_reviews';
    protected $fillable = ['user_id', 'product_id', 'description', 'rating'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public static function rating($id)
    {
    	$avg = DB::table('product_reviews')
                ->where('product_id', $id)
                ->avg('rating');
        return $avg;
    }
}
