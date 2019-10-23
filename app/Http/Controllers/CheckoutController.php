<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Hash;

class CheckoutController extends Controller
{
    public function login_check()
    {
    	return view('layouts.frontend.pages.login');
    }

    public function register_customer(Request $request)
    {
    	$validatedData = $request->validate([
	        'customer_name' => 'required',
	        'customer_email' => 'required|unique:customers',
	        'password' => 'required',
	        'moblie_number' => 'required|unique:customers|min:11|max:12',
    	]);
    	$data = array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=md5($request->password);
    	$data['moblie_number']=$request->moblie_number;
    	$customer_id = DB::table('customers')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name', $request->customer_name);
    	return redirect::to('/check-out');
    }

    public function Checkout()
    {
    	return view('layouts.frontend.pages.checkout');
    }


    public function save_shipping_details(Request $request)
    {
    	$validatedData = $request->validate([
	        'shipping_email' => 'required',
	        'shipping_first_name' => 'required',
	        'shipping_last_name' => 'required',
	        'shipping_address' => 'required',
	        'shipping_mobile_number' => 'required',
	        'shipping_city' => 'required',
    	]);

    	$data=array();
    	$data['shipping_email']=$request->shipping_email;
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_mobile_number']=$request->shipping_mobile_number;
    	$data['shipping_city']=$request->shipping_city;

    	$shipping_id =DB::table('shipping')
    			->insertGetId($data);
    	Session()->put('shipping_id', $shipping_id);
    	return Redirect::to('/payment');
    }


    public function customer_login(Request $request)
    {
        $customer_email=$request->customer_email;
        $password = md5($request->password);
        $result = DB::table('customers')
               ->where('customer_email', $customer_email)
               ->where('password', $password)
               ->first(); 
        if ($result) {
            Session::put('customer_id', $result->customer_id);
           return Redirect::to('/check-out');       
        }else {
            return Redirect::to('login-check');
        }      
    }

    public function payment()
    {

        return view('layouts.frontend.pages.payment');
    }


    public function order_place(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required',
        ]);
        $payment_method=$request->payment_method;
        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']=0;
        $payment_id = DB::table('payment')
            ->insertGetId($pdata); 

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']=0;
        $order_id=DB::table('orders')
            ->insertGetId($odata);


        $contents=Cart::content();
        $order_details_data=array();
        foreach ($contents as $v_content) {
            $order_details_data['order_id'] =$order_id;
            $order_details_data['product_id'] =$v_content->id;
            $order_details_data['product_name'] =$v_content->name;
            $order_details_data['product_price'] =$v_content->price;
            $order_details_data['product_sales_quantity'] =$v_content->qty;
            DB::table('orders_detail')
                ->insert($order_details_data);

            if ($payment_method == 'handcash') {
                Cart::destroy();
                return view('layouts.frontend.pages.handcash');
            }elseif ($payment_method == 'card') {
                echo 'Successfully done by card';
            }elseif ($payment_method == 'paypal') {
                echo 'Successfully done by Paypal';
            }else{
                echo 'Not Selected';
            }
        }

    }


    public function customer_logout()
    {
        Session::flush();
        return Redirect::to('/');
    }

}
