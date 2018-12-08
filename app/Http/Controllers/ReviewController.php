<?php

namespace App\Http\Controllers;

use App\Model\Review;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Http\Resources\Product\ReviewResource;
use App\Http\Requests\ProductReviewRequest;
use Symfony\Component\HttpFoundation\Response;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
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
    public function store(ProductReviewRequest $request, Product $product)
    {
        $review=new Review($request->all());
        $product->reviews()->save($review);
        return response([
            'data'=>new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ProductReviewRequest $request,Product $product, Review $review)
    {
        $review->update($request->all());
        return response([
            'data'=>new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Review $review)
    {
        
        $review->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}
