<?php

namespace App\Http\Controllers;

use App\Models\ProductReviews;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ProductReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->product_id = $request->id;

        $validation = Validator::make($request->all(),
            [
                'rating' => ['required','integer'],
            ]);
        if($validation->fails())
            return redirect(route('detail', ['id' => $request->product_id]))->withErrors($validation)->withInput();

        $review = new \App\Models\ProductReviews();
        $review->user_id = $request->user_id;
        $review->product_id = $request->product_id;
        $review->description = $request->description;
        $review->rating = $request->rating;

        if($review->save())
            return redirect(route('detail', ['id' => $request->product_id]));
        else
            return redirect(route('detail', ['id' => $request->product_id]))->withErrors('Review gagal diposting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsProductReviews  $modelsProductReviews
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsProductReviews $modelsProductReviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelsProductReviews  $modelsProductReviews
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsProductReviews $modelsProductReviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelsProductReviews  $modelsProductReviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsProductReviews $modelsProductReviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsProductReviews  $modelsProductReviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsProductReviews $modelsProductReviews)
    {
        //
    }
}
