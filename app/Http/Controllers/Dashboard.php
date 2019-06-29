<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReviews;


class Dashboard extends Controller
{
    //

    public function __construct()
    {
        $this->menu = "Home";
        $this->title = "Home";
    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }

    public function index(Request $request)
    {
    	$products = \App\Models\Product::get();
        $data['products'] = Product::orderProducts($request->order_by);
        $data['carousel'] = $this->carousel();

        return view('index', $this->prefix($data));
    }

    public function products(Request $request)
    {
        $products = \App\Models\Product::get();
        $data['products'] = Product::orderProducts($request->order_by);
        $data['carousel'] = $this->carousel();
        $data['menu'] = "Products";

        return view('product-index', $this->prefix($data));   
    }

    public function show($id)
    {
        Product::increaseViews($id);
    	$data['title'] = "Detail Product";
        $data['menu'] = "Products";
        $data['product'] = \App\Models\Product::find($id);
        $data['images'] = json_decode($data['product']->image_url);
        $data['review'] = \App\Models\ProductReviews::where('product_id', $id)->orderBy('id','DESC')->get();
        $data['avgRating'] =ProductReviews::rating($id);

        return view('show', $this->prefix($data));
    }

    public function carousel()
    {
        $images[] = 'https://www.notebookcheck.net/fileadmin/_processed_/c/1/csm_P1010034_5bff50146d.jpg';
        $images[] = 'https://cdn.wallpapersafari.com/71/34/tPEjR9.jpg';
        $images[] = 'http://getwallpapers.com/wallpaper/full/0/d/8/14209.jpg'; 

        $descriptions[] = 'The most fastest response from every reseller, gives greatest services with best quality and original product.';

        $data['title'] = "Republic Of Gamers";
        $data['subTitle'] = "B-NARY - ROG Reseller Official";
        $data['descriptions'] = $descriptions;
        $data['images'] = $images;

        return $data;
    }
}
