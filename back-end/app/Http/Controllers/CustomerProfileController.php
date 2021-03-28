<?php

namespace App\Http\Controllers;

use App\CustomerProfile;
use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.customer_dashboard');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerProfile $customerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerProfile $customerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerProfile $customerProfile)
    {
        //
    }

    public function address_update(Request $request){
        $profile=CustomerProfile::all()->where('user_id',auth()->user()->id);
        $profile=$profile[0];
        $profile->update([
            'address'=>$request->address,
        ]);
        return response(['messgage'=>'updated successfully..!!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerProfile  $customerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerProfile $customerProfile)
    {
        //
    }
}
