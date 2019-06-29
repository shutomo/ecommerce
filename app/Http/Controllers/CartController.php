<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->viewPrefix = 'cart';
        $this->route = "cart";
        $this->title = ucfirst($this->viewPrefix).'s';
        $this->menu = "Cart";
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

    public function index()
    {
        return view($this->viewPrefix.'.index', $this->prefix());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $msg = false;
        $product = Product::find($id);
        if(!$product)
            abort(404);

        $cart = session()->get('cart');

        var_dump(isset($cart[$id]));

        if(!$cart){
            $cart = [
                $id=> [
                    "name" => $product->name,
                    "qty" => 1,
                    "price" => $product->price,
                    "image_url" => $product->image_url,
                ]
            ];
            session()->put('cart', $cart);
            return redirect(route('cart'))->with('message', 'Product added to cart successfully!');
        }

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
            return redirect(route('cart'))->with('message', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "qty" => 1,
            "price" => $product->price,
            "image_url" => $product->image_url,
        ];
        session()->put('cart', $cart);
        
        return redirect(route('cart'))->with('message', 'Product added to cart successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $message = [
        //         'name.unique' => ucfirst($request->name).' sudah ada.',
        //         'price.integer' => 'Harga harus diisi dengan angka',
        //         'name.required'=> 'Kolom nama harus di isi ',
        //         'price.required'=> 'Kolom harga harus di isi '
        //     ];
        // $validation = Validator::make($request->all(), 
        //         [
        //             'name'=>'required|max:255|unique:packets',
        //             'price'=>'required|integer',
        //         ], $message);
        // if($validation->fails())
        //     return redirect(route($this->route.'.create'))->withErrors($validation)->withInput();

        $data = $this->model;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->term = $request->term;

        if ($data->save())
            return redirect(route($this->route));
        else
            return redirect(route($this->route.'.create'))->withErrors()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $msg = false;
        $product = Product::find($request->id);
        if(!$product)
            abort(404);

        $cart = session()->get('cart');

        // if(!$cart){
        //     $cart = [
        //         $id=> [
        //             "name" => $product->name,
        //             "qty" => $request->qty,
        //             "price" => $product->price,
        //             "image_url" => $product->image_url,
        //         ]
        //     ];
        //     $msg = true;
        // }

        if(isset($cart[$request->id])){
            $cart[$request->id]['qty'] = $request->qty;
            session()->put('cart', $cart);
            $msg = true;
        }

        if($msg)
            return redirect(route('cart'))->with('Success', 'Product added to cart successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!$request->id)
            return redirect('/');

        // memasukan list cart berbentuk array kedalam sebuah variable
        $cart = session()->get('cart');

        if(isset($cart[$request->id])){

            //menghapus data cart YANG ADA PADA VARIABLE $cart JADI BUKAN MENGHAPUS DARI SESSIONYA LANGSUNG
            unset($cart[$request->id]);

            //memasukan data variable $cart KE DALAM SESSION LAGI
            session()->put('cart', $cart);

            //gapernah kepikiran cara ginian sumpah
            
        }
    }
}
