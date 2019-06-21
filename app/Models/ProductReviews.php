<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductReviews extends Model
{
	protected $fillabale = [
	'user_id', 'product_id', 'coment', 'rating'
	];


	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getProductReviews($id){
		return $ProductReviews = DB::table('product_reviews')
								->join('products', 'product_reviews.product_id','=','products.id')
								->select('products.id','product_reviews.*')
								->where('products.id', '=', $id)
								->get();
	}

	public function getProductRating(){
		return $rating = DB::table('product_reviews')
						->avg('product_reviews.id');
	}
}
