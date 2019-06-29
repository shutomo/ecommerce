<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReviews;
use Validator;
use Auth;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'product';
        $this->route = "admin.products";
        $this->title = ucfirst($this->viewPrefix).'s';
        $this->menu = "Products";
        $this->title = "Products";
    }

    public function checkAuth($id)
    {
        $product = \App\Models\Product::find($id);
        if(!isset($product))
            return false;
        if(Auth::user()->id == $product->user_id)
            return true;
        else
            return false;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['products'] = \App\Models\Product::where('user_id',Auth::user()->id)->get();

        $data['products'] = Product::adminOrderProducts('no request', Auth::id());


        $data['title'] = $this->title;

        return view($this->viewPrefix.'.index', $this->prefix($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = $this->title;
        return view($this->viewPrefix.'.create', $this->prefix($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = Auth::user()->id;
        $validation = Validator::make($request->all(),
            [
                'name' => ['required','string','max:255'],
                'price' => ['integer','required'],
                'description' => ['string','required'],
                'filename' => 'required',
                'filename.*' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'filevideo' => 'required',
                'fileVideo' => 'file|mimes:mp4,mkv|max:20480'
            ]);
        if($validation->fails())
            return redirect(route($this->route.'.create'))->withErrors($validation)->withInput();

        $data = array();
        if($request->hasfile('filename')){
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $name = date('Y_m_d_h;s_').$name;
                $image->move(public_path().'/images/',$name);
                $data[] = $name;
            }
        }
        $dataVideo = "";
        if($request->hasfile('fileVideo')){
            // foreach ($request->file('fileVideo') as $video) {
            //     $name = $video->getClientOriginalName();
            //     $name = date('Y_m_d_h;s_').$name;
            //     $video->move(public_path().'/videos/',$name);
            //     $dataVideo[] = $name;
            // }
                $name = $request->file('fileVideo')->getClientOriginalName();
                $name = date('Y_m_d_h;s_').$name;
                // Storage::copy($request->file('fileVideo')->getClientOriginalName(), public_path().'/videos/',$name);
                $request->file('fileVideo')->move(public_path().'/videos/',$name);
                $dataVideo = $name;
        }

        $product = new \App\Models\Product();
        $product->name = $request->name;
        $product->user_id = $request->user_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image_url = json_encode($data);
        $product->video_url = $dataVideo;

        if($product->save())
            return redirect(route($this->route.'.index'));
        else
            return redirect(route($this->route.'.create'))->withErrors('Data gagal disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkAuth($id))
            return redirect(route($this->route.'.index'));

        $data['title'] = $this->title;
        $data['product'] = \App\Models\Product::find($id);
        $data['images'] = json_decode($data['product']->image_url);
        $data['review'] = \App\Models\ProductReviews::where('product_id', $id)->orderBy('id','DESC')->get();
        $data['avgRating'] =ProductReviews::rating($id);
        return view($this->viewPrefix.'.show', $this->prefix($data));
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
        if(!$this->checkAuth($id))
            return redirect(route($this->route.'.index'));

        $data['title'] = $this->title;
        $data['product'] = \App\Models\Product::find($id);
        return view($this->viewPrefix.'.edit', $this->prefix($data));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user_id = Auth::user()->id;
        $validation = Validator::make($request->all(),
            [
                'name' => ['required','string','max:255'],
                'price' => ['integer','required'],
                'description' => ['string','required'],
                'filename.*' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'filevideo' => 'required',
                'fileVideo' => 'file|mimes:mp4,mkv|max:20480'
            ]);
        if($validation->fails())
            return redirect(route($this->route.'.edit',['id' => $id]))->withErrors($validation)->withInput();

        $data = array();
        if($request->hasfile('filename')){
            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $name = date('Y_m_d_h;s_').$name;
                $image->move(public_path().'/images/',$name);
                $data[] = $name;
            }
        }
        $dataVideo = "";
        if($request->hasfile('fileVideo')){
            // foreach ($request->file('fileVideo') as $video) {
            //     $name = $video->getClientOriginalName();
            //     $name = date('Y_m_d_h;s_').$name;
            //     $video->move(public_path().'/videos/',$name);
            //     $dataVideo[] = $name;
            // }
                $name = $request->file('fileVideo')->getClientOriginalName();
                $name = date('Y_m_d_h;s_').$name;
                // Storage::copy($request->file('fileVideo')->getClientOriginalName(), public_path().'/videos/',$name);
                $request->file('fileVideo')->move(public_path().'/videos/',$name);
                $dataVideo = $name;
        }

        $product = \App\Models\Product::find($id);
        $product->name = $request->name;
        $product->user_id = $request->user_id;
        $product->description = $request->description;
        $product->price = $request->price;
        if(!empty($data))
            $product->image_url = json_encode($data);
        if(!empty($dataVideo))
            $product->video_url = $dataVideo;

        if($product->save())
            return redirect(route($this->route.'.index'));
        else
            return redirect(route($this->route.'.edit',['id' => $id]))->withErrors('Data gagal disimpan');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->checkAuth($id))
            return redirect(route($this->route.'.index'));

        $product = \App\Models\Product::find($id);
        $product->delete();
        return redirect(route($this->route.'.index'));
    }

    
}
