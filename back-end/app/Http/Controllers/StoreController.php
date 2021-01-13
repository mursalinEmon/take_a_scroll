<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::all()->where('vendor_id',auth()->user()->id);

        return view('vendor.store.store_list',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.store.create_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // $table->string('banner');

    public function store(Request $request)
    {
        $image="";
        $store=Store::create([
            'name'=>$request->store_name,
            'vendor_id'=>auth()->user()->id,
            'physical_Address'=>$request->physical_Address,
            'type'=>$request->type,
            'vendor_NID'=>$request->vendor_NID,
            'description'=>$request->description,
            'banner'=>$image,
        ]);

        if($request->file('file')){
            $image = $request->file;
            $imagePath = $request->file('file');
            $imageName= time().'.'.$imagePath->getClientOriginalExtension();
            $image->move(public_path('image/'.auth()->user()->name.'/'.$store->name.'/'),$imageName);
        }


        $store->update([
            'banner'=>'image/'.auth()->user()->name.'/'.$store->name.'/'.$imageName,
        ]);
        return response(['message'=>'Store Created Successfully..!!!','store'=>$store]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
