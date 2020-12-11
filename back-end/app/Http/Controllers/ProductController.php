<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $sub_category=SubCategory::where('name',$request->sub_cat_name)->get('id')->first();
        $sub_category_id=$sub_category->id;
        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'slug'=>$request->name.'-'.'vendor'.auth()->user()->id,
            'product_decription'=>$request->descrption,
            'category_id'=>$request->category_id,
            'product_warranty'=>$request->warrenty,
            'product_stock'=>$request->stock,
            'sub_category_id'=>$sub_category_id,
            'product_rating'=>0,
            'brand_name'=>$request->brand,
            'product_tags'=>"none",
            'vendor_id'=>auth()->user()->id
        ]);

        return response(['product'=>$product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function store_product_image(Request $request ){

        $product=Product::findOrFail($request->product_id);
       if ($product->product_pictures == null){
        $images=[];

       }
       else{
        $images=$product->product_pictures;

       }

        //image upload in the file system section
        $imageName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images/'.auth()->user()->name.'/products/'.$request->product_id), $imageName);
        $image_path='images/'.auth()->user()->name.'/products/'.$request->product_id.$imageName;
        if (!$images === null){
            array_push($images,$image_path);
         $product->update([
            'product_pictures' => $images,
         ]);
        }
        $product->update([
            'product_pictures' =>$image_path,
        ]);

        return response(['message'=>'product created successfully']);
    }
}
