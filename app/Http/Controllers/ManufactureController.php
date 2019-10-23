<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManufactureController extends Controller
{
    public function manufactureByproduct($slug)
    {
    	$productBymanufacture = DB::table('products')
    			->join('manufactures','products.manufacture_id','=','manufactures.id')
    			->select('products.*','manufactures.manufacture_name')
    			->where('products.publication_status',1)
    			->where('manufactures.slug',$slug)
    			->limit(9)
    			->get();

		return view('layouts.frontend.pages.manufacture_by_product', compact('productBymanufacture'));
    }
}
