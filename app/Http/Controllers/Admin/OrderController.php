<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_info = DB::table('orders')
                ->join('customers','orders.customer_id','=','customers.customer_id')
                ->select('orders.*','customers.customer_name')
                ->get();
        return view('admin.order.index',compact('order_info'));
    }



    public function unactive_order($order_id)
    {
        DB::table('orders')->where('order_id', $order_id)
                ->update(['order_status' => 0]);
        Toastr::success('Order Pending','Success');
        return redirect()->route('admin.order.index');
    }

    public function active_order($order_id)
    {
        DB::table('orders')->where('order_id', $order_id)
                ->update(['order_status' => 1]);
        Toastr::success('Order Successfully done','Success');
        return redirect()->route('admin.order.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order_show = DB::table('orders')
                ->join('customers','orders.customer_id','=','customers.customer_id')
                ->join('shipping','orders.shipping_id','=','shipping.shipping_id')
                ->join('payment','orders.payment_id','=','payment.payment_id')
                ->select('orders.*','customers.*','shipping.*','payment.*')
                ->where('order_id',$order_id)
                ->first();
        return view('admin.order.show_order',compact('order_show'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $order = DB::table('orders')
            ->where('order_id',$order_id);
        $order->delete();
        Toastr::success('Order Delete Successfully','Success');
        return redirect()->route('admin.order.index');
    }
}
