<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function categoryByproduct($slug)
    {
    	$productBycategory = DB::table('products')
    			->join('categories','products.category_id','=','categories.id')
    			->select('products.*','categories.category_name')
    			->where('products.publication_status',1)
    			->where('categories.slug',$slug)
    			->limit(9)
    			->get();

		return view('layouts.frontend.pages.category_by_product', compact('productBycategory'));
    }

}
