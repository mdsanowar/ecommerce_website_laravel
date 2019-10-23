<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function ViewProduct($id)
    {
    	$product_details = DB::table('products')
    			->join('categories','products.category_id','=','categories.id')
    			->join('manufactures','products.manufacture_id','=','manufactures.id')
    			->select('products.*','categories.category_name','manufactures.manufacture_name')
    			->where('products.id', $id)
    			->first();
    	return view('layouts.frontend.pages.product_details', compact('product_details'));
    }
}
