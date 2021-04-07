<?php

namespace App\Http\Controllers;

use App\Delivery;
use Auth;
use App\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
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
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }
    public function show_order($order_id){
        $order = DB::table('orders')
            ->where('id',$order_id)->get();
        $order=$order[0];
        $cart=Cart::stored_data($order->cart_identifier);
        $stores=[];
        foreach ($cart as $row){
            array_push($stores,$row->model->store_id);
        }
        $stores=array_unique($stores);
        $store_wise_row=[];
       foreach ($stores as $store){

           $prodcts=[];
           foreach ($cart as $row){

               array_push($prodcts,$row);
           }
           $store_wise_row[$store]=$prodcts;
       }
       return view('Orders.adminOrder',compact('store_wise_row','order'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
    public function allnotifications(){
        $data=[];
        $user = User::find(6);

        foreach ($user->unreadNotifications as $notification) {
            $p= $notification->data['order_id'];
            $order=DB::table('orders')
                ->where('id',$p)->get();
          $order=$order[0];
            $stat=$order->status;
            $amount=$order->amount;
            $tid=$order->transaction_id;
            $user=User::where('email',$order->email)->get();
            $user=$user[0];
            array_push($data,[
                'stat'=>$stat,
                'amount'=>$amount,
                'tid'=>$tid,
                'cus'=>$user,
                'order_id'=>$order->id
            ]);

        }
        return response(['notifications'=>$data]) ;
    }
}
