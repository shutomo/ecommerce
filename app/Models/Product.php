<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
class Product extends Model
{
  protected $fillable = [
    'name', 'price', 'description','image_url',
  ];
  public function getUserId(){
    return $products = DB::table('products')
                    ->select('products.*')
                    ->where('products.user_id','=', Auth::user()->id)
                    ->get();
                    
  }
public function productReviews()
    {
        return $this->hasMany('App\Models\ProductReview', 'product_id');
    }
public function orderProducts($order_by) {      
        $id = Auth::user()->id;
        $query = "SELECT * FROM products where products.user_id =$id ORDER BY created_at DESC";
        if ($order_by == 'best_seller'){
            
            $query = "SELECT p.*, oi.quantity FROM products  AS p 
            LEFT JOIN (
                SELECT product_id, SUM(quantity) as quantity from order_items 
                    GROUP BY product_id 
                    ) AS oi ON oi.product_id = p.id
                    ORDER BY oi.quantity DESC;";
                    
        } else if ($order_by == 'terbaik'){
            $id = Auth::user()->id;
            $query = "SELECT * FROM products where products.user_id =$id ORDER BY created_at DESC";
           
        }else if ($order_by == 'termurah') {
            $id = auth::user()->id;
            $query = "SELECT * FROM products where products.user_id ='$id' ORDER BY price ASC";
        } else if ($order_by == 'termahal') {
            $id = auth::user()->id;
            $query = "SELECT * FROM products where products.user_id ='$id' ORDER BY price DESC";
        }else if ($order_by == 'terbaru') {
            
            $id = auth::user()->id;
            $query = "SELECT * FROM products where products.user_id ='$id' ORDER BY created_at DESC";
          
        }
        
        return DB::select($query);
    }
}