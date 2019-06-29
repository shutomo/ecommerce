<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    //
    protected $fillable = ['user_id','name','description','price','image_url','video_url', 'views'];

    public static function increaseViews($id)
    {
        $query = "UPDATE products SET views = views+1 WHERE id = ".$id; 
        return DB::select($query);
    }
    public static function orderProducts($request)
    {
        $query = "SELECT products.*, SUM(qty) as quantity, (SELECT AVG(rating) FROM product_reviews WHERE product_id = products.id) AS rating FROM products LEFT JOIN order_items ON product_id = products.id  GROUP BY products.id ";
        
        if($request == 'best_seller'){            
            $query .= "ORDER BY quantity DESC";
        }else if ($request == 'terbaik'){
            $query .= "ORDER BY rating DESC";
        }else if ($request == 'termurah'){
            $query .= "ORDER BY price ASC";
        }else if ($request == 'termahal'){
            $query .= "ORDER BY price DESC";
        }else if($request == 'terbaru'){
            $query .= "ORDER BY created_at DESC";
        }else if($request == 'most_viewer'){
            $query .= "ORDER BY views DESC";
        }else{
            $query .= "ORDER BY created_at DESC";
        }

        return DB::select($query);
    }

    public static function adminOrderProducts($request,$id)
    {
        $query = "SELECT products.*, SUM(qty) as quantity, (SELECT AVG(rating) FROM product_reviews WHERE product_id = products.id) AS rating FROM products LEFT JOIN order_items ON product_id = products.id  WHERE products.user_id = $id GROUP BY products.id ";
        
        if($request == 'best_seller'){            
            $query .= "ORDER BY quantity DESC";
        }else if ($request == 'terbaik'){
            $query .= "ORDER BY rating DESC";
        }else if ($request == 'termurah'){
            $query .= "ORDER BY price ASC";
        }else if ($request == 'termahal'){
            $query .= "ORDER BY price DESC";
        }else if($request == 'terbaru'){
            $query .= "ORDER BY created_at DESC";
        }else if($request == 'most_viewer'){
            $query .= "ORDER BY views DESC";
        }else{
            $query .= "ORDER BY created_at DESC";
        }
        return DB::select($query);
    }
}
