<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty = $request->qty;
    	$product_id = $request->id;
    	$product_info = DB::table('products')
    		->where('id',$product_id)
    		->first();
    	$data['qty'] = $qty;
    	$data['id'] = $product_info->id;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = floatval($product_info->product_price);
    	$data['weight'] = floatval($product_info->product_size);
    	$data['options']['image'] = $product_info->product_image;

    	Cart::add($data);
    	return Redirect::to('/show-cart');

    }

    public function show_cart()
    {
    	$all_publish_category = DB::table('categories')
    				->where(['publication_status' => 1])
    				->get();
    	return view('layouts.frontend.pages.add_to_cart', compact('all_publish_category'));
    }

    public function delete_to_cart($rowId)
    {
    	Cart::update($rowId, 0);
    	return Redirect::to('/show-cart');
    }


    public function update_cart(Request $request, $rowId)
    {
    	$qty=$request->qty;
    	Cart::update($rowId, $qty);
    	return Redirect::to('/show-cart');
    }



}
